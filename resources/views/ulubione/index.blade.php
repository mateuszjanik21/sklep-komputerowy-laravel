@extends('main', ['title' => 'Ulubione produkty'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Moje ulubione</h1>
    </div>

    @if($produkty->isNotEmpty())
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($produkty as $produkt)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="{{ route('produkty.showPublic', $produkt->Id) }}">
                            <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/400' }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $produkt->Nazwa }}">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title h6">
                                <a href="{{ route('produkty.showPublic', $produkt->Id) }}" class="text-decoration-none text-dark">{{ Str::limit($produkt->Nazwa, 55) }}</a>
                            </h5>
                            <small class="text-muted mb-2">Dodano: {{ $produkt->pivot->DataUtworzenia->format('d.m.Y') }}</small>
                            
                            <div class="mt-auto">
                                <p class="h5 text-primary fw-bold mb-3">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</p>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 p-3">
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('koszyk.dodaj', $produkt) }}" class="flex-grow-1 me-2">
                                    @csrf
                                    <input type="hidden" name="ilosc" value="1">
                                    <button type="submit" class="btn btn-sm btn-success w-100" @if($produkt->IloscNaStanie == 0) disabled @endif>
                                        <i class="bi bi-cart-plus"></i> Do koszyka
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('ulubione.destroy', $produkt) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Usuń z ulubionych">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-5 bg-light rounded-3">
            <i class="bi bi-heartbreak" style="font-size: 80px; color: #6c757d;"></i>
            <h2 class="mt-4">Twoja lista ulubionych jest pusta</h2>
            <p class="lead">Dodaj produkty, które Ci się podobają, klikając ikonę serca.</p>
            <a href="{{ route('produkty.index') }}" class="btn btn-primary btn-lg mt-3">Przeglądaj produkty</a>
        </div>
    @endif
@endsection