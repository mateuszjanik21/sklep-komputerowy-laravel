@extends('layouts.admin', ['title' => 'Nowy Atrybut'])
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Formularz nowego atrybutu</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.atrybuty.store') }}">
            @csrf
            <div class="mb-3">
                <label for="Nazwa" class="form-label">Nazwa atrybutu</label>
                <input type="text" class="form-control @error('Nazwa') is-invalid @enderror" id="Nazwa" name="Nazwa" value="{{ old('Nazwa') }}" required>
                @error('Nazwa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategorie" class="form-label">Przypisz do kategorii (opcjonalnie, przytrzymaj Ctrl, aby zaznaczyć wiele)</label>
                <select name="kategorie[]" id="kategorie" class="form-select" multiple size="10">
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->Id }}">{{ $kategoria->Nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.atrybuty.index') }}" class="btn btn-secondary me-2">Anuluj</a>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
</div>
@endsection
