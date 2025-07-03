@extends('main', ['title' => 'Panel Klienta'])

@section('content')
<div class="p-3 mb-1 bg-light rounded-3">
    <div class="container-fluid py-4">
        <h1 class="display-5 fw-bold">Witaj, {{ Auth::user()->Nazwa }}!</h1>
        <p class="col-md-8 fs-5">
            To jest Twoje osobiste centrum zarządzania. Poniżej znajdziesz swoje ostatnie zamówienia oraz skróty do najważniejszych sekcji konta.
        </p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h4 class="mb-0">Ostatnie zamówienia</h4>
    </div>
    <div class="card-body p-0">
        @if($zamowienia->isNotEmpty())
            <ul class="list-group list-group-flush">
                @foreach($zamowienia->take(5) as $zamowienie) {{-- Wyświetlamy do 5 ostatnich zamówień --}}
                    <li class="list-group-item p-3">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <strong class="d-block">Nr zamówienia</strong>
                                <span>#{{ $zamowienie->Id }}</span>
                            </div>
                            <div class="col-md-3">
                                <strong class="d-block">Data złożenia</strong>
                                <span>{{ $zamowienie->DataUtworzenia->format('d.m.Y') }}</span>
                            </div>
                            <div class="col-md-2">
                                <strong class="d-block">Suma</strong>
                                <span>{{ number_format($zamowienie->CalkowitaKwota, 2, ',', ' ') }} zł</span>
                            </div>
                            <div class="col-md-3">
                                <strong class="d-block">Status</strong>
                                <span class="badge bg-primary fs-6">{{ $zamowienie->Status }}</span>
                            </div>
                            <div class="col-md-2 text-end">
                                <a href="{{ route('zamowienia.show', $zamowienie) }}" class="btn btn-sm btn-primary">
                                    Szczegóły
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-center p-5">
                <p class="text-muted fs-5">Nie złożyłeś jeszcze żadnych zamówień.</p>
                <a href="{{ route('home') }}" class="btn btn-success">Rozpocznij zakupy</a>
            </div>
        @endif
    </div>
</div>

<div class="row align-items-md-stretch mt-4">
    <div class="col-md-6 mb-4">
        <div class="h-100 p-5 bg-dark text-white rounded-3 d-flex flex-column justify-content-center">
            <h2>Ulubione produkty</h2>
            <p>Przeglądaj listę zapisanych przez siebie produktów i przenieś je do koszyka, gdy będziesz gotów.</p>
            <a href="{{ route('ulubione.index') }}" class="btn btn-outline-light mt-auto">Przejdź do ulubionych</a>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="h-100 p-5 bg-body-secondary border rounded-3 d-flex flex-column justify-content-center">
            <h2>Ustawienia konta</h2>
            <p>W tej sekcji możesz zaktualizować swoje dane osobowe oraz zmienić hasło do konta.</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary mt-auto">Zarządzaj profilem</a>
        </div>
    </div>
</div>
@endsection