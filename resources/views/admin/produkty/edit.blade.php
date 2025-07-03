@extends('layouts.admin', ['title' => 'Edytuj produkt'])

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edycja produktu: {{ $produkt->Nazwa }}</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.produkty.update', $produkt->Id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="Nazwa" class="form-label">Nazwa produktu</label>
                        <input type="text" class="form-control" id="Nazwa" name="Nazwa" required value="{{ old('Nazwa', $produkt->Nazwa) }}">
                    </div>
                    <div class="mb-3">
                        <label for="Opis" class="form-label">Opis</label>
                        <textarea class="form-control" id="Opis" name="Opis" rows="10">{{ old('Opis', $produkt->Opis) }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="SKU" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="SKU" name="SKU" required value="{{ old('SKU', $produkt->SKU) }}">
                    </div>
                    <div class="mb-3">
                        <label for="KategoriaId" class="form-label">Kategoria</label>
                        <div class="input-group">
                            <select class="form-select" id="KategoriaId" name="KategoriaId" required>
                                @foreach($kategorie as $kategoria)
                                    <option value="{{ $kategoria->Id }}" @if(old('KategoriaId', $produkt->KategoriaId) == $kategoria->Id) selected @endif>
                                        {{ $kategoria->Nazwa }}
                                    </option>
                                @endforeach
                            </select>
                            <a href="{{ route('admin.kategorie.create', ['return_url' => url()->current()]) }}" class="btn btn-outline-secondary">Nowa</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Cena" class="form-label">Cena (zł)</label>
                        <input type="number" step="0.01" class="form-control" id="Cena" name="Cena" required value="{{ old('Cena', $produkt->Cena) }}">
                    </div>
                    <div class="mb-3">
                        <label for="IloscNaStanie" class="form-label">Ilość na stanie</label>
                        <input type="number" class="form-control" id="IloscNaStanie" name="IloscNaStanie" required value="{{ old('IloscNaStanie', $produkt->IloscNaStanie) }}">
                    </div>
                    <div class="mb-3">
                        <label for="UrlZdjecia" class="form-label">URL zdjęcia</label>
                        <input type="url" class="form-control" id="UrlZdjecia" name="UrlZdjecia" value="{{ old('UrlZdjecia', $produkt->UrlZdjecia) }}">
                    </div>
                </div>
            </div>

            <hr class="my-4">
            <h4>Specyfikacje Techniczne</h4>
            <div id="specyfikacje-kontener" data-initial-count="{{ $produkt->atrybuty->count() }}">
                {{-- Wyświetl już istniejące specyfikacje --}}
                @foreach($produkt->atrybuty as $atrybut)
                    <div class="row mb-2 specyfikacja-wiersz" data-atrybut-id="{{ $atrybut->Id }}">
                        <div class="col-md-4">
                            <input type="text" class="form-control atrybut-nazwa" value="{{ $atrybut->Nazwa }}" readonly disabled>
                            <input type="hidden" name="specyfikacje[{{ $loop->index }}][atrybut_id]" value="{{ $atrybut->Id }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="specyfikacje[{{ $loop->index }}][wartosc]" class="form-control" value="{{ $atrybut->pivot->Wartosc }}">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger w-100 usun-specyfikacje-btn">Usuń</button>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="input-group mt-3">
                <select id="select-atrybutu" class="form-select"></select>
                <button type="button" id="dodaj-specyfikacje-btn" class="btn btn-outline-success">Dodaj wybraną</button>
            </div>
            
            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.produkty.index') }}" class="btn btn-secondary me-2">Anuluj</a>
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
        setup: function (editor) {
            editor.on('change', function () { editor.save(); });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const kategoriaSelect = document.getElementById('KategoriaId');
        const atrybutSelect = document.getElementById('select-atrybutu');
        const dodajBtn = document.getElementById('dodaj-specyfikacje-btn');
        const kontener = document.getElementById('specyfikacje-kontener');
        let index = parseInt(kontener.dataset.initialCount, 10) || 0;

        function getUzyteAtrybutyIds() {
            const ids = new Set();
            kontener.querySelectorAll('.specyfikacja-wiersz').forEach(wiersz => {
                ids.add(wiersz.dataset.atrybutId);
            });
            return ids;
        }

        async function wczytajAtrybutyDlaKategorii(kategoriaId) {
            atrybutSelect.innerHTML = '<option>Ładowanie...</option>';
            atrybutSelect.disabled = true;
            dodajBtn.disabled = true;

            try {
                const response = await fetch(`/admin/api/kategorie/${kategoriaId}/atrybuty`);
                const atrybuty = await response.json();
                
                const uzyteIds = getUzyteAtrybutyIds();
                
                atrybutSelect.innerHTML = '';
                const dostepneAtrybuty = atrybuty.filter(atrybut => !uzyteIds.has(String(atrybut.Id)));

                if (dostepneAtrybuty.length > 0) {
                    dostepneAtrybuty.forEach(atrybut => {
                        const option = new Option(atrybut.Nazwa, atrybut.Id);
                        atrybutSelect.add(option);
                    });
                    atrybutSelect.disabled = false;
                    dodajBtn.disabled = false;
                } else {
                    atrybutSelect.innerHTML = '<option value="">Brak dostępnych atrybutów</option>';
                    atrybutSelect.disabled = true;
                    dodajBtn.disabled = true;
                }
            } catch (error) { console.error('Błąd wczytywania atrybutów:', error); }
        }

        kategoriaSelect.addEventListener('change', function() {
            kontener.innerHTML = '';
            index = 0;
            wczytajAtrybutyDlaKategorii(this.value); 
        });

        dodajBtn.addEventListener('click', function() {
            const wybranyOption = atrybutSelect.options[atrybutSelect.selectedIndex];
            if (!wybranyOption || !wybranyOption.value) return;

            const wybranyAtrybutId = wybranyOption.value;
            const wybranyAtrybutText = wybranyOption.text;

            const nowyWierszHTML = `
                <div class="row mb-2 specyfikacja-wiersz" data-atrybut-id="${wybranyAtrybutId}">
                    <div class="col-md-4">
                        <input type="text" class="form-control atrybut-nazwa" value="${wybranyAtrybutText}" readonly disabled>
                        <input type="hidden" name="specyfikacje[${index}][atrybut_id]" value="${wybranyAtrybutId}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="specyfikacje[${index}][wartosc]" class="form-control" placeholder="Wprowadź wartość...">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger w-100 usun-specyfikacje-btn">Usuń</button>
                    </div>
                </div>`;
            kontener.insertAdjacentHTML('beforeend', nowyWierszHTML);
            index++;
            wybranyOption.remove();
            if (atrybutSelect.options.length === 0) {
                atrybutSelect.innerHTML = '<option value="">Brak dostępnych atrybutów</option>';
                atrybutSelect.disabled = true;
                dodajBtn.disabled = true;
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('usun-specyfikacje-btn')) {
                const wiersz = e.target.closest('.specyfikacja-wiersz');
                const atrybutId = wiersz.dataset.atrybutId;
                const atrybutNazwa = wiersz.querySelector('.atrybut-nazwa').value;
                
                if (atrybutSelect.querySelector('option[value=""]')) {
                    atrybutSelect.innerHTML = '';
                    atrybutSelect.disabled = false;
                    dodajBtn.disabled = false;
                }
                atrybutSelect.add(new Option(atrybutNazwa, atrybutId));
                wiersz.remove();
            }
        });

        if (kategoriaSelect.value) { wczytajAtrybutyDlaKategorii(kategoriaSelect.value); }
    });
</script>
@endpush