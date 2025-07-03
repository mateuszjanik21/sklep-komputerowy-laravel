@extends('layouts.admin', ['title' => 'Edycja Kategorii'])

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edycja kategorii: {{ $kategoria->Nazwa }}</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.kategorie.update', $kategoria->Id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Nazwa" class="form-label">Nazwa kategorii</label>
                    <input type="text" class="form-control @error('Nazwa') is-invalid @enderror" id="Nazwa" name="Nazwa" value="{{ old('Nazwa', $kategoria->Nazwa) }}" required>
                    @error('Nazwa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Ikona" class="form-label">Ikona kategorii</label>
                    @include('admin.kategorie.icon-select', ['selectedIcon' => old('Ikona', $kategoria->Ikona)])
                </div>
            </div>

            <div class="mb-3">
                <label for="Opis" class="form-label">Opis (opcjonalnie)</label>
                <textarea class="form-control" id="Opis" name="Opis" rows="6">{{ old('Opis', $kategoria->Opis) }}</textarea>
            </div>
    
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.kategorie.index') }}" class="btn btn-secondary me-2">Anuluj</a>
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: 'textarea#Opis',
        skin: 'oxide-dark',
        content_css: 'dark',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
@endpush