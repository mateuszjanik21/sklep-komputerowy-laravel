@extends('main', ['title' => 'Szczegóły zamówienia'])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2 mb-0">Szczegóły zamówienia nr {{ $zamowienie->Id }}</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Wróć do panelu
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Zamówione produkty</h5>
            </div>
            <div class="card-body">
                @foreach($zamowienie->elementyZamowienia as $element)
                <div class="row align-items-center mb-3 pb-3 border-bottom">
                    <div class="col-2">
                        <img src="{{ $element->produkt->UrlZdjecia ?? 'https://via.placeholder.com/150' }}" class="img-fluid rounded" alt="{{ $element->produkt->Nazwa }}">
                    </div>
                    <div class="col-6">
                        <a href="{{ route('produkty.showPublic', $element->produkt->Id) }}" class="text-decoration-none text-dark fw-bold">{{ $element->produkt->Nazwa }}</a>
                        <small class="d-block text-muted">Ilość: {{ $element->Ilosc }}</small>
                    </div>
                    <div class="col-4 text-end">
                        <p class="mb-0">{{ number_format($element->Cena * $element->Ilosc, 2, ',', ' ') }} zł</p>
                        <small class="text-muted">{{ number_format($element->Cena, 2, ',', ' ') }} zł / szt.</small>
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
                <p><strong>Data zamówienia:</strong> {{ $zamowienie->DataUtworzenia->format('d.m.Y H:i') }}</p>
                <p><strong>Status:</strong> <span class="badge bg-primary fs-6">{{ $zamowienie->Status }}</span></p>
                <hr>
                <div class="d-flex justify-content-between h5">
                    <strong>Suma:</strong>
                    <strong>{{ number_format($zamowienie->CalkowitaKwota, 2, ',', ' ') }} zł</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 justify-content-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Wróć na stronę główną</a>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-lg">Zobacz moje zamówienia</a>
    </div>
</div>
@endsection