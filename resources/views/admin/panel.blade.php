@extends('layouts.admin', ['title' => 'Panel główny'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3">Witaj, administratorze!</h2>
            <p class="text-muted mb-0">Aktualna data i godzina: <span id="zegar-czasu-rzeczywistego">{{ $aktualnaData->format('d.m.Y H:i:s') }}</span></p>
        </div>
        <div>
            <a href="{{ route('admin.produkty.create') }}" class="btn btn-primary">
                <span class="material-icons-outlined align-middle me-1">add</span>
                Dodaj nowy produkt
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: #0078d4;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div><h3 class="card-title h2">{{ $liczbaProduktow }}</h3><p class="card-text">Produktów w bazie</p></div>
                    <span class="material-icons-outlined" style="font-size: 3rem; opacity: 0.5;">inventory_2</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: #34495e;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div><h3 class="card-title h2">{{ $liczbaKategorii }}</h3><p class="card-text">Kategorii</p></div>
                    <span class="material-icons-outlined" style="font-size: 3rem; opacity: 0.5;">category</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: #00b894;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div><h3 class="card-title h2">{{ $liczbaUzytkownikow }}</h3><p class="card-text">Klientów</p></div>
                    <span class="material-icons-outlined" style="font-size: 3rem; opacity: 0.5;">people</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Sprzedaż w ciągu ostatnich 7 dni
                </div>
                <div class="card-body">
                    <canvas id="wykresSprzedazy"
                            data-labels="{{ json_encode($datyWykresu) }}"
                            data-values="{{ json_encode($sumyWykresu) }}"
                            style="min-height: 250px;">
                    </canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">Ostatnie zamówienia
                    <a href="{{ route('admin.zamowienia.index') }}" class="btn btn-sm btn-outline-secondary">Zobacz wszystkie</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($ostatnieZamowienia as $zamowienie)
                            <li class="list-group-item">
                                <div>
                                    <a href="{{ route('admin.zamowienia.show', $zamowienie->Id) }}"><strong>Zamówienie #{{ $zamowienie->Id }}</strong></a>
                                    <span class="float-end fw-bold">{{ number_format($zamowienie->CalkowitaKwota, 2, ',', ' ') }} zł</span>
                                </div>
                                <small class="d-block text-muted">od: {{ $zamowienie->uzytkownik->Nazwa }} | Status: {{ $zamowienie->Status }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Brak nowych zamówień.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">Ostatnie opinie
                    <a href="{{ route('admin.opinie.index') }}" class="btn btn-sm btn-outline-secondary">Zobacz wszystkie</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($ostatnieOpinie as $opinia)
                            <li class="list-group-item">
                                <strong>{{ $opinia->uzytkownik->Nazwa }}</strong> ocenił
                                <a href="{{ route('admin.produkty.show', $opinia->produkt->Id) }}">{{ Str::limit($opinia->produkt->Nazwa, 20) }}</a>
                                <div class="text-warning d-inline-block">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="material-icons-outlined align-middle" style="font-size: 1rem;">{{ $i <= $opinia->Ocena ? 'star' : 'star_border' }}</span>
                                    @endfor
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Brak nowych opinii.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function aktualizujZegar() {
        const el = document.getElementById('zegar-czasu-rzeczywistego');
        if(el) el.textContent = new Date().toLocaleString('pl-PL', { dateStyle: 'long', timeStyle: 'medium' });
    }
    setInterval(aktualizujZegar, 1000);

    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('wykresSprzedazy');

        try {
            const labels = JSON.parse(ctx.dataset.labels || '[]');
            const values = JSON.parse(ctx.dataset.values || '[]');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Suma sprzedaży (zł)',
                        data: values,
                        backgroundColor: 'rgba(52, 152, 219, 0.7)',
                        borderColor: 'rgba(52, 152, 219, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            ticks: { color: '#f0f0f0' }, 
                            grid: { color: 'rgba(255, 255, 255, 0.1)' } 
                        },
                        x: { 
                            ticks: { color: '#f0f0f0' }, 
                            grid: { display: false } 
                        }
                    },
                    plugins: { 
                        legend: { 
                            labels: { color: '#f0f0f0' } 
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Suma: ' + context.parsed.y + ' zł';
                                }
                            }
                        }
                    }
                }
            });
        } catch (e) {
            console.error("Błąd podczas inicjalizacji wykresu:", e);
            const context = ctx.getContext('2d');
            context.fillStyle = 'rgba(255, 100, 100, 0.8)';
            context.font = '16px sans-serif';
            context.textAlign = 'center';
            context.fillText('Wystąpił błąd podczas ładowania danych wykresu.', ctx.width / 2, ctx.height / 2);
        }
    });
</script>
@endpush