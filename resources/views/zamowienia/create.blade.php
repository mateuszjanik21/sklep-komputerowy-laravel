@extends('main', ['title' => 'Podsumowanie zamówienia'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Podsumowanie zamówienia</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Dane zamawiającego</h5>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Imię i nazwisko:</strong> {{ Auth::user()->Nazwa }}</p>
                    <p class="mb-0"><strong>Adres e-mail:</strong> {{ Auth::user()->Email }}</p>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Twoje produkty</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($produkty as $produkt)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    {{ $produkt->Nazwa }}
                                    <small class="d-block text-muted">Ilość: {{ $koszyk[$produkt->Id]['ilosc'] }}</small>
                                </div>
                                <span class="fw-bold">{{ number_format($produkt->Cena * $koszyk[$produkt->Id]['ilosc'], 2, ',', ' ') }} zł</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 position-sticky" style="top: 1.5rem;">
                <div class="card-body">
                    <h4 class="card-title mb-4">Do zapłaty</h4>
                    <div class="d-flex justify-content-between">
                        <span>Suma częściowa</span>
                        <span>{{ number_format($sumaCalkowita, 2, ',', ' ') }} zł</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Dostawa</span>
                        <span class="text-success">Darmowa</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold h5">
                        <span>Suma</span>
                        <span>{{ number_format($sumaCalkowita, 2, ',', ' ') }} zł</span>
                    </div>
                    
                    <form method="POST" action="{{ route('zamowienia.store') }}" class="d-grid gap-2 mt-4">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg">Potwierdź i zapłać</button>
                        <a href="{{ route('koszyk.index') }}" class="btn btn-outline-secondary">Wróć do koszyka</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection