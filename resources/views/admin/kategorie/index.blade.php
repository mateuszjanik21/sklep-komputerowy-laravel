@extends('layouts.admin', ['title' => 'Zarządzanie Kategoriami'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lista kategorii</h2>
        <a href="{{ route('admin.kategorie.create') }}" class="btn btn-primary">
            <span class="material-icons-outlined align-middle me-1" style="font-size: 1.2rem;">add</span>
            Dodaj nową kategorię
        </a>
    </div>

    @if($kategorie->isEmpty())
        <div class="alert alert-info">
            Nie zdefiniowano jeszcze żadnych kategorii.
        </div>
    @else
        <div class="row">
            @foreach($kategorie as $kategoria)
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body" style="min-height: 170px;"> 
                            <div class="row g-0 h-100">
                                <div class="col-md-3 d-flex justify-content-center align-items-center">
                                    @if($kategoria->Ikona && file_exists(public_path('images/icons/kategorie/' . $kategoria->Ikona)))
                                        <img src="{{ asset('images/icons/kategorie/' . $kategoria->Ikona) }}" alt="Ikona kategorii" style="width: 64px; height: 64px;">
                                    @else
                                        <span class="material-icons-outlined text-muted" style="font-size: 64px;">category</span>
                                    @endif
                                </div>
                                <div class="col-md-9 d-flex flex-column">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{ $kategoria->Nazwa }}</h5>
                                        <div>
                                            <a href="{{ route('admin.kategorie.edit', $kategoria->Id) }}" class="btn btn-primary btn-sm" title="Edytuj">
                                                <span class="material-icons-outlined" style="font-size: 1rem">edit</span>
                                            </a>
                                            <form method="POST" action="{{ route('admin.kategorie.destroy', $kategoria->Id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Usuń" onclick="return confirm('Czy na pewno? Usunięcie będzie niemożliwe, jeśli do kategorii są przypisane produkty.')">
                                                    <span class="material-icons-outlined" style="font-size: 1rem">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <p class="card-text text-muted">
                                        {{ Str::limit(strip_tags($kategoria->Opis), 100) ?? 'Brak opisu.' }}
                                    </p>

                                    <div class="d-flex justify-content-start gap-4 mt-auto pt-2">
                                        <div>
                                            <h6 class="mb-0">{{ $kategoria->produkty_count }}</h6>
                                            <small class="text-muted">Produktów</small>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ $kategoria->atrybuty_count }}</h6>
                                            <small class="text-muted">Atrybutów</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection