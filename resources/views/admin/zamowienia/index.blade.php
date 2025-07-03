@extends('layouts.admin', ['title' => 'Zarządzanie Zamówieniami'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lista zamówień</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.zamowienia.index') }}" class="mb-4">
                <div class="row g-2 align-items-end">
                    <div class="col-md-5">
                        <label for="status" class="form-label">Filtruj po statusie</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Wszystkie statusy</option>
                            @foreach(['Nowe', 'W trakcie realizacji', 'Wysłane', 'Zakończone', 'Anulowane'] as $status)
                                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filtruj</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID Zam.</th>
                            <th>Klient</th>
                            <th>Data</th>
                            <th class="text-end">Kwota</th>
                            <th class="text-center">Status</th>
                            <th class="text-end">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($zamowienia as $zamowienie)
                            <tr>
                                <th scope="row">#{{ $zamowienie->Id }}</th>
                                <td>{{ $zamowienie->uzytkownik->Nazwa }}</td>
                                <td>{{ $zamowienie->DataUtworzenia->format('d.m.Y H:i') }}</td>
                                <td class="text-end">{{ number_format($zamowienie->CalkowitaKwota, 2, ',', ' ') }} zł</td>
                                <td class="text-center">
                                    <span class="badge bg-info">{{ $zamowienie->Status }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.zamowienia.show', $zamowienie->Id) }}" class="btn btn-info btn-sm" title="Zobacz szczegóły">
                                        <span class="material-icons-outlined" style="font-size: 1rem">visibility</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Nie znaleziono zamówień pasujących do kryteriów.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $zamowienia->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection