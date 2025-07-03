@extends('layouts.admin', ['title' => 'Edycja Atrybutu'])
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edycja atrybutu: {{ $atrybut->Nazwa }}</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.atrybuty.update', $atrybut->Id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Nazwa" class="form-label">Nazwa atrybutu</label>
                <input type="text" class="form-control @error('Nazwa') is-invalid @enderror" id="Nazwa" name="Nazwa" value="{{ old('Nazwa', $atrybut->Nazwa) }}" required>
                @error('Nazwa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategorie" class="form-label">Przypisane kategorie (przytrzymaj Ctrl, aby zaznaczyć wiele)</label>
                <select name="kategorie[]" id="kategorie" class="form-select" multiple size="10">
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->Id }}" {{ $atrybut->kategorie->contains($kategoria->Id) ? 'selected' : '' }}>
                            {{ $kategoria->Nazwa }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.atrybuty.index') }}" class="btn btn-secondary me-2">Anuluj</a>
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form>
    </div>
</div>
@endsection
