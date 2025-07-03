@extends('main', ['title' => 'Sklep z podzespołami komputerowymi'])

@section('content')
    <div class="text-center p-5 mb-5 rounded-3" style="background: url('https://images.unsplash.com/photo-1593640408182-31c70c8268f5?fit=crop&w=1600&h=600') center center; background-size: cover;">
        <div class="container-fluid py-5">
            <h1 class="display-4 fw-bold text-white text-shadow-black">Komponenty, które napędzają pasję.</h1>
            <p class="fs-4 text-white text-shadow-black">Odkryj podzespoły, które zmienią Twój komputer w maszynę do wygrywania.</p>
            <form method="GET" action="{{ route('produkty.index') }}" class="mt-4 col-md-8 mx-auto">
                <div class="input-group input-group-lg">
                    <input type="text" name="szukaj" class="form-control" placeholder="Wpisz np. 'karta graficzna RTX'..." aria-label="Wyszukaj produkt">
                    <button class="btn btn-success" type="submit" style="background-color: #2A9D8F; border-color: #2A9D8F;">
                        <i class="bi bi-search"></i> Szukaj
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row text-center mb-5">
        <div class="col-md-4"><span class="material-icons-outlined" style="font-size: 48px; color: var(--primary-color);">local_shipping</span><h4 class="my-2">Szybka Wysyłka</h4><p class="text-muted">Zamówienia realizujemy w ciągu 24 godzin.</p></div>
        <div class="col-md-4"><span class="material-icons-outlined" style="font-size: 48px; color: var(--primary-color);">verified_user</span><h4 class="my-2">Gwarancja Jakości</h4><p class="text-muted">Oferujemy tylko sprawdzone komponenty.</p></div>
        <div class="col-md-4"><span class="material-icons-outlined" style="font-size: 48px; color: var(--primary-color);">support_agent</span><h4 class="my-2">Fachowe Doradztwo</h4><p class="text-muted">Nasz zespół ekspertów chętnie Ci pomoże.</p></div>
    </div>
    <hr class="mb-5">

    <h2 class="mb-3">Polecane produkty</h2>
    <div class="row" id="polecane-kontener">
        @forelse($polecaneProdukty as $produkt)
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm lift product-card">
                    <a href="{{ route('produkty.showPublic', $produkt->Id) }}" class="product-card-link"></a>
                    <div class="position-relative">
                        <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/400x300' }}" class="card-img-top fixed-img" alt="{{ $produkt->Nazwa }}" loading="lazy">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fs-6">{{ Str::limit($produkt->Nazwa, 50) }}</h5>
                        <p class="card-text text-muted mb-2">{{ $produkt->kategoria->Nazwa }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <p class="card-text h5 mb-0">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-3 text-end">
                        @auth
                            <button type="button" class="btn btn-sm btn-light me-1 toggle-fav-btn" data-id="{{ $produkt->Id }}">
                                @if(in_array($produkt->Id, $ulubioneIds))
                                    <i class="bi bi-heart-fill"></i>
                                @else
                                    <i class="bi bi-heart"></i>
                                @endif
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-light me-1" title="Zaloguj się, by dodać do ulubionych"><i class="bi bi-heart"></i></a>
                        @endauth
                        <button type="button" class="btn btn-sm btn-light add-to-cart-btn" 
                            data-id="{{ $produkt->Id }}" @if($produkt->IloscNaStanie == 0) disabled @endif>
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Brak polecanych produktów do wyświetlenia.</p>
        @endforelse
    </div>
    <hr class="mb-5">

    <h2 class="mb-3">Ostatnio dodane</h2>
    <div class="row">
        @forelse($najnowszeProdukty as $produkt)
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm lift product-card">
                    <a href="{{ route('produkty.showPublic', $produkt->Id) }}" class="product-card-link"></a>
                    <div class="position-relative">
                        @if($produkt->DataUtworzenia->diffInDays(now()) <= 7)
                            <span class="new-badge">NOWOŚĆ</span>
                        @endif
                        <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/400x300' }}" class="card-img-top fixed-img" alt="{{ $produkt->Nazwa }}" loading="lazy">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fs-6">{{ Str::limit($produkt->Nazwa, 50) }}</h5>
                        <p class="card-text text-muted mb-2">{{ $produkt->kategoria->Nazwa }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <p class="card-text h5 mb-0">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-end">
                        @auth
                            <button type="button" class="btn btn-sm btn-light me-1 toggle-fav-btn" data-id="{{ $produkt->Id }}">
                                @if(in_array($produkt->Id, $ulubioneIds))
                                    <i class="bi bi-heart-fill"></i>
                                @else
                                    <i class="bi bi-heart"></i>
                                @endif
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-light me-1" title="Zaloguj się, by dodać do ulubionych"><i class="bi bi-heart"></i></a>
                        @endauth
                        <button type="button" class="btn btn-sm btn-light add-to-cart-btn" 
                            data-id="{{ $produkt->Id }}" @if($produkt->IloscNaStanie == 0) disabled @endif>
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Brak nowych produktów do wyświetlenia.</p>
        @endforelse
    </div>

    @guest
        <hr class="mb-5">
        <div class="p-5 text-center bg-light rounded-3">
            <h2 class="h1">Dołącz do naszej społeczności!</h2>
            <p class="lead">Załóż darmowe konto, aby zapisywać ulubione produkty, składać zamówienia i śledzić ich status.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Zarejestruj się teraz</a>
        </div>
    @endguest

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

@push('styles')
<style>
    .lift { transition: transform .2s ease-in-out, box-shadow .2s ease-in-out; }
    .lift:hover { transform: translateY(-5px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
    .fixed-img { width: 100%; height: 200px; object-fit: cover; }
    .product-card { position: relative; }
    .product-card-link { position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1; }
    .card-footer { position: relative; z-index: 2; }
    .new-badge { position: absolute; top: 0.5rem; left: 0.5rem; background-color: #e76f51; color: white; font-weight: bold; padding: 0.25rem 0.5rem; font-size: 0.75rem; border-radius: 0.25rem; z-index: 3; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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

    document.body.addEventListener('click', async function(e) {
        const cartButton = e.target.closest('.add-to-cart-btn');
        const favButton = e.target.closest('.toggle-fav-btn');

        if (!cartButton && !favButton) return;
        
        e.preventDefault();

        const button = cartButton || favButton;
        const produktId = button.dataset.id;
        
        let url = cartButton ? `/api/koszyk/dodaj/${produktId}` : `/api/ulubione/toggle/${produktId}`;
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ ilosc: 1 })
            });

            if(response.status === 401) { 
                window.location.href = loginUrl;
                return;
            }
            const data = await response.json();

            if (data.status === 'success') {
                if (cartButton) {
                    showToast('Sukces!', data.message || 'Produkt dodany do koszyka!');
                }
                if (favButton) {
                    const icon = favButton.querySelector('.bi');
                    if(data.czyPolubiono) {
                        icon.classList.remove('bi-heart');
                        icon.classList.add('bi-heart-fill');
                        showToast('Sukces!', 'Dodano do ulubionych!');
                    } else {
                        icon.classList.remove('bi-heart-fill');
                        icon.classList.add('bi-heart');
                        showToast('Sukces!', 'Usunięto z ulubionych.');
                    }
                }
            } else { showToast('Błąd!', 'Wystąpił nieoczekiwany błąd.'); }
        } catch (error) {
            console.error('Błąd AJAX:', error);
            showToast('Błąd!', 'Wystąpił nieoczekiwany błąd.');
        }
    });
});
</script>
@endpush