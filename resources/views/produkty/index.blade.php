@extends('main', ['title' => 'Wszystkie produkty'])

@push('styles')
<style>
    .product-list-card .product-image-wrapper {
        max-height: 250px;
        overflow: hidden;
    }
    .product-list-card .product-image {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card shadow-sm border-0 mb-4 position-sticky" style="top: 1.5rem;">
            <div class="card-header bg-white">
                <h5 class="mb-0">Filtry</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('produkty.index') }}">
                    <div class="mb-3">
                        <label for="szukaj" class="form-label">Nazwa produktu</label>
                        <input type="text" name="szukaj" id="szukaj" class="form-control" value="{{ request('szukaj') }}" placeholder="Wpisz frazę...">
                    </div>
                    <div class="mb-3">
                        <label for="kategoria" class="form-label">Kategoria</label>
                        <select name="kategoria" id="kategoria" class="form-select">
                            <option value="">Wszystkie kategorie</option>
                            @foreach($kategorie as $kat)
                                <option value="{{ $kat->Id }}" {{ request('kategoria') == $kat->Id ? 'selected' : '' }}>
                                    {{ $kat->Nazwa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Filtruj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        @forelse($produkty as $produkt)
            <div class="card shadow-sm border-0 mb-3 product-list-card">
                <div class="row g-0">
                    <div class="col-md-3 product-image-wrapper">
                    <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/400' }}" class="img-fluid rounded-start product-image" alt="{{ $produkt->Nazwa }}">
                    </div>
                    <div class="col-md-9 d-flex flex-column">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produkt->Nazwa }}</h5>
                            <p class="card-text mb-2"><small class="text-muted">{{ $produkt->kategoria->Nazwa }}</small></p>

                            @if($produkt->atrybuty->isNotEmpty())
                                <div class="mb-2">
                                    @foreach($produkt->atrybuty->take(3) as $atrybut)
                                        <span class="badge bg-light text-dark">{{ $atrybut->Nazwa }}: {{ $atrybut->pivot->Wartosc }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="text-warning small mb-3">
                                @if($produkt->opinie_count > 0)
                                    @php $srednia = round($produkt->opinie_avg_ocena ?? 0); @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $srednia ? 'bi-star-fill' : 'bi-star' }}"></i>
                                    @endfor
                                    <span class="text-muted align-middle">({{ $produkt->opinie_count }} opinii)</span>
                                @else
                                    <span class="text-muted">Brak opinii</span>
                                @endif
                            </div>
                            
                            <p class="card-text small d-none d-md-block">{!! Str::limit(strip_tags($produkt->Opis), 150) !!}</p>
                            <a href="{{ route('produkty.showPublic', $produkt) }}" class="stretched-link" aria-label="Zobacz produkt {{ $produkt->Nazwa }}"></a>
                        </div>
                        <div class="card-footer bg-transparent border-0 mt-auto p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="h4 text-primary fw-bold mb-0">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</p>
                                <div style="position: relative; z-index: 2;">
                                    @auth
                                        <button class="btn btn-sm btn-light me-1 toggle-fav-btn" data-id="{{ $produkt->Id }}" title="Dodaj do ulubionych">
                                            @if(in_array($produkt->Id, $ulubioneIds))
                                                <i class="bi bi-heart-fill"></i>
                                            @else
                                                <i class="bi bi-heart"></i>
                                            @endif
                                        </button>
                                    @endauth
                                    <button class="btn btn-sm btn-light add-to-cart-btn" data-id="{{ $produkt->Id }}" title="Dodaj do koszyka" @if($produkt->IloscNaStanie == 0) disabled @endif>
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <h4 class="alert-heading">Brak wyników</h4>
                    <p>Nie znaleziono produktów spełniających podane kryteria. Spróbuj zmienić filtry.</p>
                    <hr>
                    <a href="{{ route('produkty.index') }}" class="btn btn-primary">Pokaż wszystkie produkty</a>
                </div>
            </div>
        @endforelse

        <div class="mt-4">
            {{ $produkty->withQueryString()->links() }}
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bi bi-check-circle-fill me-2 text-success"></i>
            <strong class="me-auto" id="toast-title"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast-body"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const loginUrl = document.body.dataset.loginUrl;

    const toastElement = document.getElementById('liveToast');
    const toast = new bootstrap.Toast(toastElement);
    const toastTitle = document.getElementById('toast-title');
    const toastBody = document.getElementById('toast-body');

    function showToast(title, body) {
        toastTitle.textContent = title;
        toastBody.textContent = body;
        toast.show();
    }

    async function handleApiRequest(url, successMessage, body = null) {
        const fetchOptions = {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        };

        if (body) {
            fetchOptions.body = JSON.stringify(body);
        }

        try {
            const response = await fetch(url, fetchOptions);

            if (response.status === 401) {
                window.location.href = loginUrl;
                return null;
            }

            const data = await response.json();

            if (response.ok && data.status === 'success') {
                showToast('Sukces!', successMessage);
                return data;
            } else {
                showToast('Błąd!', data.message || 'Wystąpił nieoczekiwany błąd.');
                return null;
            }
        } catch (error) {
            console.error('Błąd:', error);
            showToast('Błąd!', 'Nie udało się wykonać operacji.');
            return null;
        }
    }

    const cartButtons = document.querySelectorAll('.add-to-cart-btn');
    for (const button of cartButtons) {
        button.addEventListener('click', async function (e) {
            e.stopPropagation();
            const produktId = this.dataset.id;
            const url = `/api/koszyk/dodaj/${produktId}`;
            await handleApiRequest(url, 'Produkt dodany do koszyka!', { ilosc: 1 });
        });
    }

    const favButtons = document.querySelectorAll('.toggle-fav-btn');
    for (const button of favButtons) {
        button.addEventListener('click', async function (e) {
            e.stopPropagation();
            const produktId = this.dataset.id;
            const url = `/api/ulubione/toggle/${produktId}`;
            const icon = this.querySelector('i.bi');

            const data = await handleApiRequest(url, 'Status ulubionych zaktualizowany!');
            if (data) {
                if (data.czyPolubiono) {
                    icon.classList.remove('bi-heart');
                    icon.classList.add('bi-heart-fill');
                } else {
                    icon.classList.remove('bi-heart-fill');
                    icon.classList.add('bi-heart');
                }
            }
        });
    }
});
</script>
@endpush