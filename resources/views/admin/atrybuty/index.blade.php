@extends('layouts.admin', ['title' => 'Zarządzanie Atrybutami'])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h2 class="mb-0">Dane techniczne według kategorii</h2>
    </div>

    <div class="mb-4">
        <ul class="nav nav-pills" id="filtrKategorii">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-kategoria-id="wszystkie">Wszystkie</a>
            </li>
            @foreach($kategorie as $kategoria)
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#" data-kategoria-id="{{ $kategoria->Id }}">
                        @if($kategoria->Ikona)
                            <img src="{{ asset('images/icons/kategorie/' . $kategoria->Ikona) }}" class="me-2" style="width: 20px;">
                        @endif
                        {{ $kategoria->Nazwa }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


    @if($kategorie->isEmpty())
        <div class="alert alert-info">
            Brak zdefiniowanych kategorii. <a href="{{ route('admin.kategorie.create') }}">Dodaj pierwszą kategorię</a>, aby móc przypisać do niej atrybuty.
        </div>
    @endif

    <div id="kontenerKategorii"> 
        @foreach($kategorie as $kategoria)
            <div class="card mb-4 kategoria-card" data-kategoria-id="{{ $kategoria->Id }}">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h4 class="mb-0 kategoria-nazwa d-flex align-items-center">
                        @if($kategoria->Ikona && file_exists(public_path('images/icons/kategorie/' . $kategoria->Ikona)))
                            <img src="{{ asset('images/icons/kategorie/' . $kategoria->Ikona) }}" class="me-2" style="width: 28px;">
                        @endif
                        {{ $kategoria->Nazwa }}
                    </h4>
                    
                    <form class="d-flex flex-grow-1 form-dodaj-atrybut" style="max-width: 400px;" data-kategoria-id="{{ $kategoria->Id }}">
                        <input type="text" name="Nazwa" class="form-control form-control-sm me-2" placeholder="Nazwa nowego atrybutu..." required>
                        <button type="submit" class="btn btn-sm btn-success flex-shrink-0">Dodaj</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-hover mb-0">
                        <tbody id="tabela-atrybutow-{{ $kategoria->Id }}">
                            @forelse($kategoria->atrybuty as $atrybut)
                                <tr>
                                    <td>{{ $atrybut->Nazwa }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.atrybuty.edit', $atrybut->Id) }}" class="btn btn-primary btn-sm">Edytuj</a>
                                        <form method="POST" action="{{ route('admin.atrybuty.destroy', $atrybut->Id) }}" class="d-inline"> @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno?')">Usuń</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="brak-atrybutow-info"><td colspan="2" class="text-muted text-center">Brak atrybutów przypisanych do tej kategorii.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuFiltra = document.getElementById('filtrKategorii');
        const wszystkieKarty = document.querySelectorAll('.kategoria-card');

        menuFiltra.addEventListener('click', function(e) {
            if (e.target.closest('a')) {
                e.preventDefault();
                
                const link = e.target.closest('a');

                menuFiltra.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                link.classList.add('active');

                const wybranyId = link.dataset.kategoriaId;

                wszystkieKarty.forEach(function(karta) {
                    if (wybranyId === 'wszystkie' || karta.dataset.kategoriaId === wybranyId) {
                        karta.style.display = 'block';
                    } else {
                        karta.style.display = 'none';
                    }
                });
            }
        });
        document.querySelectorAll('.form-dodaj-atrybut').forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const input = this.querySelector('input[name="Nazwa"]');
            const nazwa = input.value.trim();
            const kategoriaId = this.dataset.kategoriaId;
            const tabelaBody = document.getElementById(`tabela-atrybutow-${kategoriaId}`);

            if (!nazwa) return;

            try {
                const response = await fetch(`/admin/kategorie/${kategoriaId}/atrybuty`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ Nazwa: nazwa })
                });

                const nowyAtrybut = await response.json();

                if (response.ok) {
                    const nowyWierszHTML = `
                        <tr>
                            <td>${nowyAtrybut.Nazwa}</td>
                            <td class="text-end">
                                <a href="/admin/atrybuty/${nowyAtrybut.Id}/edit" class="btn btn-primary btn-sm">Edytuj</a>
                                <form method="POST" action="/admin/atrybuty/${nowyAtrybut.Id}" class="d-inline">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno?')">Usuń</button>
                                </form>
                            </td>
                        </tr>`;
                    
                    const infoRow = tabelaBody.querySelector('.brak-atrybutow-info');
                    if (infoRow) infoRow.remove();

                    tabelaBody.insertAdjacentHTML('beforeend', nowyWierszHTML);
                    input.value = '';
                } else {
                    alert('Błąd: ' + (nowyAtrybut.errors.Nazwa[0] || 'Nie można dodać atrybutu.'));
                }
            } catch (error) {
                console.error('Błąd AJAX:', error);
                alert('Wystąpił nieoczekiwany błąd.');
            }
        });
    });
});
</script>
@endpush