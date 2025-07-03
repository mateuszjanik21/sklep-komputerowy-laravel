@extends('main', ['title' => $produkt->Nazwa])

@push('styles')
<style>
    .description-wrapper {
        position: relative;
        overflow: hidden;
        transition: max-height 0.5s ease-out;
    }
    .description-wrapper.collapsed {
        max-height: 250px;
    }
    .description-wrapper.collapsed::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, transparent, white);
    }
    .rating-bar-container { 
        background-color: #e9ecef; border-radius: .25rem; 
    }
    .rating-bar { 
        background-color: #ffc107; height: 10px; border-radius: .25rem; 
    }
    .product-gallery-image { 
        border: 2px solid transparent; cursor: pointer; transition: border-color .2s ease; 
    }
    .product-gallery-image:hover, .product-gallery-image.active { 
        border-color: var(--primary-color); 
        }
</style>
@endpush

@section('content')
<div class="bg-white p-4 p-md-5 rounded-3 shadow-sm">
    <div class="row">
        <div class="col-lg-7">
            <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/800' }}" class="img-fluid rounded" alt="{{ $produkt->Nazwa }}" id="mainProductImage">
        </div>

        <div class="col-lg-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Strona główna</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('produkty.index', ['kategoria' => $produkt->kategoria->Id]) }}">{{ $produkt->kategoria->Nazwa }}</a></li>
                </ol>
            </nav>
            <h1 class="h2">{{ $produkt->Nazwa }}</h1>

            <div class="d-flex align-items-center mb-3">
                @if($opinie->count() > 0)
                    <div class="text-warning me-2">
                        @php $srednia = round($opinie->avg('Ocena')); @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= $srednia ? 'bi-star-fill' : 'bi-star' }}"></i>
                        @endfor
                    </div>
                    <a href="#opinie" class="text-muted text-decoration-none">({{ $opinie->count() }} opinii)</a>
                @else
                    <p class="text-muted mb-0">Brak opinii</p>
                @endif
            </div>

            <p class="lead">{!! Str::limit(strip_tags($produkt->Opis), 200) !!}</p>
            
            <p class="h1 my-4 text-primary fw-bolder">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</p>

            @if($produkt->IloscNaStanie > 5)
                <p class="text-success fw-bold"><i class="bi bi-check-circle-fill"></i> Duża dostępność</p>
            @elseif($produkt->IloscNaStanie > 0)
                <p class="text-warning fw-bold"><i class="bi bi-exclamation-triangle-fill"></i> Ostatnie sztuki!</p>
            @else
                <p class="text-danger fw-bold"><i class="bi bi-x-circle-fill"></i> Produkt niedostępny</p>
            @endif

            <hr>

            <form method="POST" action="{{ route('koszyk.dodaj', $produkt) }}" class="d-flex my-4">
                @csrf
                <input type="number" name="ilosc" value="1" min="1" max="{{ $produkt->IloscNaStanie }}" class="form-control me-3" style="width: 80px;" @if($produkt->IloscNaStanie == 0) disabled @endif>
                <button type="submit" class="btn btn-success btn-lg flex-grow-1" @if($produkt->IloscNaStanie == 0) disabled @endif>
                    <i class="bi bi-cart-plus me-2"></i>Dodaj do koszyka
                </button>
            </form>

            @auth
                @if($isUlubiony)
                    <form method="POST" action="{{ route('ulubione.destroy', $produkt) }}" class="d-grid"> @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger"><i class="bi bi-heart-fill me-2"></i>Usuń z ulubionych</button></form>
                @else
                    <form method="POST" action="{{ route('ulubione.store', $produkt) }}" class="d-grid"> @csrf <button type="submit" class="btn btn-outline-danger"><i class="bi bi-heart me-2"></i>Dodaj do ulubionych</button></form>
                @endif
            @endauth
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-8">
        <div class="bg-white p-4 p-md-5 rounded-3 shadow-sm mb-4">
            <h3 class="mb-4">Opis produktu</h3>
            <div id="description-wrapper" class="description-wrapper collapsed">
                {!! $produkt->Opis !!}
            </div>
            <button id="toggle-description" class="btn btn-link text-decoration-none ps-0">Czytaj więcej <i class="bi bi-chevron-down"></i></button>
        </div>
        <div class="bg-white p-4 p-md-5 rounded-3 shadow-sm mb-4">
            <h3 class="mb-4">Dane techniczne</h3>
            @if($produkt->atrybuty->isNotEmpty())
                <table class="table table-striped">
                    <tbody>
                        @foreach($produkt->atrybuty as $atrybut)
                        <tr>
                            <th style="width: 35%;">{{ $atrybut->Nazwa }}</th>
                            <td>{{ $atrybut->pivot->Wartosc }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Ten produkt nie ma szczegółowej specyfikacji.</p>
            @endif
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="position-sticky" style="top: 1.5rem;">
            <div class="bg-white p-4 rounded-3 shadow-sm">
                <h5>Kluczowe cechy</h5>
                <ul class="list-unstyled mb-0">
                    @forelse($produkt->atrybuty->take(3) as $atrybut)
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <span class="text-muted">{{ $atrybut->Nazwa }}</span>
                            <strong>{{ Str::limit($atrybut->pivot->Wartosc, 25) }}</strong>
                        </li>
                    @empty
                        <li class="text-muted">Brak kluczowych cech do wyświetlenia.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="opinie" class="bg-white p-4 p-md-5 rounded-3 shadow-sm mt-4">
    <h3 class="mb-4">Opinie o produkcie ({{ $opinie->count() }})</h3>
    <div class="row">
        <div class="col-lg-4">
            @auth
                @if($uzytkownikJuzOcenil)
                    <div class="alert alert-success">Dziękujemy, oceniłeś już ten produkt.</div>
                @else
                    <h5>Napisz opinię</h5>
                    <form method="POST" action="{{ route('opinie.store', $produkt) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="Ocena" class="form-label">Twoja ocena (1-5)</label>
                            <select class="form-select" name="Ocena" id="Ocena" required>
                                <option value="5">5 - Doskonały</option>
                                <option value="4">4 - Bardzo dobry</option>
                                <option value="3">3 - Przeciętny</option>
                                <option value="2">2 - Słaby</option>
                                <option value="1">1 - Bardzo słaby</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Komentarz" class="form-label">Komentarz (opcjonalnie)</label>
                            <textarea name="Komentarz" id="Komentarz" rows="4" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj opinię</button>
                    </form>
                @endif
            @else
                <div class="alert alert-light">
                    <a href="{{ route('login') }}">Zaloguj się</a>, aby dodać opinię.
                </div>
            @endguest
        </div>
        <div class="col-lg-8">
            @forelse($opinie as $opinia)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold mb-0">{{ $opinia->uzytkownik->Nazwa }}</p>
                        <small class="text-muted">{{ $opinia->DataUtworzenia->format('d.m.Y') }}</small>
                    </div>
                    <div class="text-warning my-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= $opinia->Ocena ? 'bi-star-fill' : 'bi-star' }}"></i>
                        @endfor
                    </div>
                    <p class="mb-0">{{ $opinia->Komentarz }}</p>
                </div>
            @empty
                <p class="text-muted">Ten produkt nie ma jeszcze żadnych opinii. Bądź pierwszy!</p>
            @endforelse
        </div>
    </div>
</div>

@if($polecaneProdukty->isNotEmpty())
<div class="mt-5">
    <h3 class="mb-4">Klienci kupili również</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
        @foreach($polecaneProdukty as $polecany)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <a href="{{ route('produkty.showPublic', $polecany->Id) }}" class="stretched-link"></a>
                    <img src="{{ $polecany->UrlZdjecia ?? 'https://via.placeholder.com/400' }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $polecany->Nazwa }}">
                    <div class="card-body">
                        <h5 class="card-title h6">{{ Str::limit($polecany->Nazwa, 55) }}</h5>
                        <p class="card-text h5 text-primary fw-bold">{{ number_format($polecany->Cena, 2, ',', ' ') }} zł</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.getElementById('description-wrapper');
    const button = document.getElementById('toggle-description');

    if (button) {
        if (wrapper.scrollHeight <= 250) {
            button.style.display = 'none';
        }

        button.addEventListener('click', function() {
            const isCollapsed = wrapper.classList.contains('collapsed');
            if (isCollapsed) {
                wrapper.classList.remove('collapsed');
                button.innerHTML = 'Zwiń <i class="bi bi-chevron-up"></i>';
            } else {
                wrapper.classList.add('collapsed');
                button.innerHTML = 'Czytaj więcej <i class="bi bi-chevron-down"></i>';
            }
        });
    }
});
</script>
@endpush