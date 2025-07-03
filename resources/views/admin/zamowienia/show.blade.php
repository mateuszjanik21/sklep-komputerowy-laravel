@extends('layouts.admin', ['title' => 'Szczegóły zamówienia #' . $zamowienie->Id])

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('admin.zamowienia.index') }}" class="btn btn-outline-secondary">
        <span class="material-icons-outlined align-middle">arrow_back</span> Wróć do listy zamówień
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Pozycje w zamówieniu</h4>
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Produkt</th>
                            <th class="text-center">Ilość</th>
                            <th class="text-end">Cena jednostkowa</th>
                            <th class="text-end">Suma</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zamowienie->elementyZamowienia as $element)
                        <tr>
                            <td>
                                <a href="{{ route('admin.produkty.show', $element->produkt->Id) }}">
                                    {{ $element->produkt->Nazwa }}
                                </a>
                            </td>
                            <td class="text-center">{{ $element->Ilosc }} szt.</td>
                            <td class="text-end">{{ number_format($element->Cena, 2, ',', ' ') }} zł</td>
                            <td class="text-end">{{ number_format($element->Ilosc * $element->Cena, 2, ',', ' ') }} zł</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end h5">Łącznie:</td>
                            <td class="text-end h5">{{ number_format($zamowienie->CalkowitaKwota, 2, ',', ' ') }} zł</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Informacje</h4>
            </div>
            <div class="card-body">
                <p>
                    <strong>Klient:</strong><br>
                    {{ $zamowienie->uzytkownik->Nazwa }}<br>
                    <small class="text-muted">{{ $zamowienie->uzytkownik->Email }}</small>
                </p>
                <p>
                    <strong>Data złożenia:</strong><br>
                    {{ $zamowienie->DataUtworzenia->format('d.m.Y H:i:s') }}
                </p>
                <hr class="border-secondary">
                @if(!in_array($zamowienie->Status, ['Zakończone', 'Anulowane']))
                    <form action="{{ route('admin.zamowienia.zmienStatus', $zamowienie->Id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="Status" class="form-label">Zmień status zamówienia:</label>
                            <select name="Status" id="Status" class="form-select mt-2">
                                @foreach(['Nowe', 'W trakcie realizacji', 'Wysłane', 'Zakończone', 'Anulowane'] as $status)
                                    <option value="{{ $status }}" @if($zamowienie->Status == $status) selected @endif>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Zapisz status</button>
                    </form>
                @else
                    <p class="text-center text-muted">Status tego zamówienia jest ostateczny i nie można go już zmienić.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection