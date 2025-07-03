@extends('layouts.admin', ['title' => 'Zarządzanie Opiniami'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Zarządzanie opiniami</h2>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.opinie.index') }}">
                <div class="row g-3 align-items-end">
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
                    <div class="col-md-5">
                        <label for="sortowanie" class="form-label">Sortuj według</label>
                        <select name="sortowanie" id="sortowanie" class="form-select">
                            <option value="nowe" {{ request('sortowanie', 'nowe') == 'nowe' ? 'selected' : '' }}>Od najnowszych</option>
                            <option value="stare" {{ request('sortowanie') == 'stare' ? 'selected' : '' }}>Od najstarszych</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filtruj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($opinie->isEmpty())
        <div class="alert alert-info text-center">
            Nie znaleziono opinii pasujących do wybranych kryteriów.
        </div>
    @else
        <div class="row">
            @foreach($opinie as $opinia)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 d-flex flex-column" id="opinia-card-{{ $opinia->Id }}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="fw-bold">
                                <a href="{{ route('admin.produkty.show', $opinia->produkt->Id) }}" title="{{ $opinia->produkt->Nazwa }}" class="text-light text-decoration-none">
                                    {{ Str::limit($opinia->produkt->Nazwa, 20) }}
                                </a>
                            </span>
                            <span class="badge {{ $opinia->CzyAktywny ? 'bg-success' : 'bg-secondary' }} status-badge">{{ $opinia->CzyAktywny ? 'Widoczna' : 'Ukryta' }}</span>
                        </div>
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ $opinia->produkt->UrlZdjecia ?? 'https://via.placeholder.com/100' }}" alt="{{ $opinia->produkt->Nazwa }}" class="rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                                <div>
                                    <p class="mb-0">Autor: <strong>{{ $opinia->uzytkownik->Nazwa }}</strong></p>
                                    <div class="text-warning my-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bi {{ $i <= $opinia->Ocena ? 'bi-star-fill' : 'bi-star' }}"></i>
                                        @endfor
                                    </div>
                                    <small class="text-muted">{{ $opinia->DataUtworzenia->format('d.m.Y H:i') }}</small>
                                </div>
                            </div>
                            
                            <p class="fst-italic flex-grow-1">
                                "{{ $opinia->Komentarz ?? 'Brak komentarza.' }}"
                            </p>
                        </div>
                        <div class="card-footer text-end bg-transparent border-top-0">
                            <button type="button" class="btn btn-info btn-sm toggle-status-btn" data-id="{{ $opinia->Id }}">
                                {{ $opinia->CzyAktywny ? 'Ukryj' : 'Pokaż' }}
                            </button>
                            <form method="POST" action="{{ route('admin.opinie.destroy', $opinia->Id) }}" class="d-inline ms-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tej operacji nie można cofnąć. Czy na pewno chcesz trwale usunąć tę opinię?')">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $opinie->withQueryString()->links() }}
        </div>
    @endif
@endsection

@push('scripts')
<script>
document.addEventListener('click', async function(e) {
    if (e.target && e.target.classList.contains('toggle-status-btn')) {
        e.preventDefault();
        const przycisk = e.target;
        const opiniaId = przycisk.dataset.id;
        const card = document.getElementById(`opinia-card-${opiniaId}`);
        const statusBadge = card.querySelector('.status-badge');

        try {
            const response = await fetch(`/admin/opinie/${opiniaId}/status`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            });

            const data = await response.json();

            if (data.success) {
                przycisk.textContent = data.przyciskText;
                statusBadge.textContent = data.statusText;
                
                if (data.nowyStatus) {
                    statusBadge.classList.remove('bg-secondary');
                    statusBadge.classList.add('bg-success');
                } else {
                    statusBadge.classList.remove('bg-success');
                    statusBadge.classList.add('bg-secondary');
                }
            } else {
                alert('Wystąpił błąd podczas zmiany statusu.');
            }
        } catch (error) {
            console.error('Błąd AJAX:', error);
            alert('Wystąpił nieoczekiwany błąd.');
        }
    }
});
</script>
@endpush