@php
    $ikony = [
        'procesor.png' => 'Procesor (CPU)',
        'pamiec-ram.png' => 'Pamięć RAM',
        'plyta-glowna.png' => 'Płyta główna',
        'karta-graficzna.png' => 'Karta graficzna (GPU)',
        'dysk-ssd.png' => 'Dysk SSD',
        'dysk-hdd.png' => 'Dysk HDD',
        'zasilacz.png' => 'Zasilacz (PSU)',
        'obudowa.png' => 'Obudowa PC',
        'chlodzenie.png' => 'Chłodzenie',
        'mysz.png' => 'Mysz',
        'klawiatura.png' => 'Klawiatura',
    ];
@endphp

<div class="border rounded p-3" style="max-height: 250px; overflow-y: auto;">
    <div class="row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Ikona" id="ikona-brak" value="" {{ ($selectedIcon ?? '') == '' ? 'checked' : '' }}>
                <label class="form-check-label" for="ikona-brak">
                    Brak ikony
                </label>
            </div>
        </div>

        @foreach($ikony as $nazwaPliku => $etykieta)
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Ikona" id="ikona-{{ $loop->index }}" value="{{ $nazwaPliku }}" {{ ($selectedIcon ?? '') == $nazwaPliku ? 'checked' : '' }}>
                    <label class="form-check-label" for="ikona-{{ $loop->index }}">
                        {{-- Używamy funkcji asset() do wygenerowania poprawnej ścieżki --}}
                        <img src="{{ asset('images/icons/kategorie/' . $nazwaPliku) }}" alt="{{ $etykieta }}" class="me-2" style="width: 24px; vertical-align: middle;">
                        {{ $etykieta }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>