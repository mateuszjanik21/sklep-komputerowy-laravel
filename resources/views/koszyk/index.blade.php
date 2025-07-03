@extends('main', ['title' => 'Twój koszyk'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Twój koszyk</h1>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kontynuuj zakupy
        </a>
    </div>

    @if(!empty($koszyk))
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @foreach($koszyk as $item)
                            <div class="row align-items-center mb-4 pb-4 border-bottom">
                                <div class="col-md-2">
                                    <img src="{{ $item['produkt']->UrlZdjecia ?? 'https://via.placeholder.com/150' }}" class="img-fluid rounded" alt="{{ $item['produkt']->Nazwa }}">
                                </div>
                                <div class="col-md-4">
                                    <h5 class="h6 mb-0">{{ $item['produkt']->Nazwa }}</h5>
                                    <small class="text-muted">{{ $item['produkt']->kategoria->Nazwa }}</small>
                                </div>
                                <div class="col-md-3">
                                    <form method="POST" action="{{ route('koszyk.aktualizuj', $item['produkt']) }}" class="d-flex align-items-center quantity-form">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="ilosc" class="form-control form-control-sm text-center quantity-input" value="{{ $item['ilosc'] }}" min="1" max="{{ $item['produkt']->IloscNaStanie }}">
                                    </form>
                                </div>
                                <div class="col-md-2 text-end">
                                    <p class="fw-bold mb-0">{{ number_format($item['suma_pozycji'], 2, ',', ' ') }} zł</p>
                                </div>
                                <div class="col-md-1 text-end">
                                    <form method="POST" action="{{ route('koszyk.usun', $item['produkt']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Usuń produkt">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 position-sticky" style="top: 1.5rem;">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Podsumowanie</h4>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Suma częściowa</span>
                            <span>{{ number_format($sumaCalkowita, 2, ',', ' ') }} zł</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold h5">
                            <span>Do zapłaty</span>
                            <span>{{ number_format($sumaCalkowita, 2, ',', ' ') }} zł</span>
                        </div>
                        <hr>
                        <div class="d-grid gap-2">
                            <a href="{{ route('zamowienia.create') }}" class="btn btn-success btn-lg">
                                Przejdź do podsumowania <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">Akceptujemy płatności</small>
                            <div class="d-flex justify-content-center gap-2 fs-4 mt-1">
                                <i class="bi bi-credit-card"></i>
                                <i class="bi bi-paypal"></i>
                                <i class="bi bi-google"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center p-5 bg-light rounded-3">
            <i class="bi bi-cart-x" style="font-size: 80px; color: #6c757d;"></i>
            <h2 class="mt-4">Twój koszyk jest pusty</h2>
            <p class="lead">Nie dodałeś jeszcze żadnych produktów. Czas to zmienić!</p>
            <a href="{{ route('produkty.index') }}" class="btn btn-primary btn-lg mt-3">Przeglądaj produkty</a>
        </div>
    @endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.quantity-input');

    let debounceTimer;
    function debounce(callback, time) {
        window.clearTimeout(debounceTimer);
        debounceTimer = window.setTimeout(callback, time);
    }

    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const form = this.closest('.quantity-form');
            debounce(() => form.submit(), 500);
        });
    });
});
</script>
@endpush