@extends('layouts.admin', ['title' => 'Zarządzanie Produktami'])

@push('styles')
<style>
    .produkt-nieaktywny {
        opacity: 0.5;
    }
</style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lista produktów</h2>
        <a href="{{ route('admin.produkty.create') }}" class="btn btn-primary">Dodaj nowy produkt</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.produkty.index') }}">
                <div class="row g-2 align-items-end">
                    <div class="col-md-5">
                        <label for="szukaj" class="form-label">Szukaj po nazwie / SKU</label>
                        <input type="text" name="szukaj" id="szukaj" class="form-control" placeholder="Wpisz frazę..." value="{{ request('szukaj') }}">
                    </div>
                    <div class="col-md-5">
                        <label for="kategoria_id" class="form-label">Filtruj po kategorii</label>
                        <select name="kategoria_id" id="kategoria_id" class="form-select">
                            <option value="">Wszystkie kategorie</option>
                            @foreach($kategorie as $kategoria)
                                <option value="{{ $kategoria->Id }}" {{ request('kategoria_id') == $kategoria->Id ? 'selected' : '' }}>
                                    {{ $kategoria->Nazwa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filtruj</button>
                    </div>
                </div>
            </form>

            <hr>

            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="width: 80px;"></th>
                            <th>Nazwa</th>
                            <th>Kategoria</th>
                            <th class="text-center">Polubienia</th>
                            <th class="text-end">Cena</th>
                            <th class="text-end">Ilość</th>
                            <th>Status</th>
                            <th class="text-end">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produkty as $produkt)
                            <tr class="{{ !$produkt->CzyAktywny ? 'produkt-nieaktywny' : '' }}">
                                <th scope="row">{{ $produkt->Id }}</th>
                                <td>
                                    <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/150' }}" alt="{{ $produkt->Nazwa }}" width="60" class="rounded">
                                </td>
                                <td>{{ $produkt->Nazwa }}</td>
                                <td>{{ $produkt->kategoria->Nazwa }}</td>
                                <td class="text-center">{{ $produkt->ulubiony_przez_uzytkownikow_count }}</td>
                                <td class="text-end">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</td>
                                <td class="text-end">{{ $produkt->IloscNaStanie }}</td>
                                <td>
                                    @if($produkt->CzyAktywny)
                                        <span class="badge bg-success">Aktywny</span>
                                    @else
                                        <span class="badge bg-secondary">Nieaktywny</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.produkty.show', $produkt->Id) }}" class="btn btn-sm btn-info" title="Podgląd">
                                        <span class="material-icons-outlined" style="font-size: 1rem">visibility</span>
                                    </a>
                                    <a href="{{ route('admin.produkty.edit', $produkt->Id) }}" class="btn btn-sm btn-primary" title="Edytuj">
                                        <span class="material-icons-outlined" style="font-size: 1rem">edit</span>
                                    </a>
                                    
                                    <form method="POST" action="{{ $produkt->CzyAktywny ? route('admin.produkty.destroy', $produkt->Id) : route('admin.produkty.restore', $produkt->Id) }}" class="d-inline">
                                        @csrf
                                        @method($produkt->CzyAktywny ? 'DELETE' : 'POST')
                                        <button type="submit" class="btn btn-sm {{ $produkt->CzyAktywny ? 'btn-danger' : 'btn-success' }}" title="{{ $produkt->CzyAktywny ? 'Dezaktywuj' : 'Aktywuj' }}">
                                            <span class="material-icons-outlined" style="font-size: 1rem">{{ $produkt->CzyAktywny ? 'toggle_off' : 'toggle_on' }}</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Nie znaleziono produktów pasujących do kryteriów.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $produkty->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection