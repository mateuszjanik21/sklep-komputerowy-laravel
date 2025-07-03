@extends('layouts.admin', ['title' => 'Szczegóły produktu: ' . Str::limit($produkt->Nazwa, 25)])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.produkty.index') }}" class="btn btn-outline-secondary">
            <span class="material-icons-outlined align-middle">arrow_back</span> Wróć do listy
        </a>
        <div>
            <a href="{{ route('admin.produkty.edit', $produkt->Id) }}" class="btn btn-primary">
                <span class="material-icons-outlined align-middle">edit</span> Edytuj
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <img src="{{ $produkt->UrlZdjecia ?? 'https://via.placeholder.com/400' }}" class="img-fluid rounded" alt="{{ $produkt->Nazwa }}">
                </div>
            </div>
        </div>
        <div class="col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h4>Szczegóły i Statystyki</h4>
                </div>
                <div class="card-body">
                    <p><strong>SKU:</strong> {{ $produkt->SKU }}</p>
                    <p><strong>Cena:</strong> <span class="h5">{{ number_format($produkt->Cena, 2, ',', ' ') }} zł</span></p>
                    <p><strong>Ilość na stanie:</strong> {{ $produkt->IloscNaStanie }} szt.</p>
                    <p><strong>Kategoria:</strong> {{ $produkt->kategoria->Nazwa }}</p>
                    <p><strong>Status:</strong>
                        @if($produkt->CzyAktywny) <span class="badge bg-success">Aktywny</span> @else <span class="badge bg-secondary">Nieaktywny</span> @endif
                    </p>
                    <hr class="border-secondary">
                    <p><strong>Polubienia:</strong> {{ $produkt->ulubiony_przez_uzytkownikow_count }} razy</p>
                    <p><strong>Liczba opinii:</strong> {{ $produkt->opinie_count }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Pełny opis produktu</h4>
        </div>
        <div class="card-body">
            <div class="opis-wrapper">
                <div id="opisProduktu" class="opis-zwiniety">
                    {!! $produkt->Opis !!}
                </div>
            </div>
            <button id="przyciskOpisu" class="btn btn-outline-secondary btn-sm mt-3">Rozwiń opis</button>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Przypisane specyfikacje</h4>
        </div>
        <div class="card-body">
            @if($produkt->atrybuty->isNotEmpty())
                <table class="table table-dark table-striped">
                    <tbody>
                        @foreach($produkt->atrybuty as $atrybut)
                            <tr>
                                <th style="width: 30%;">{{ $atrybut->Nazwa }}</th>
                                <td>{{ $atrybut->pivot->Wartosc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Ten produkt nie ma jeszcze przypisanych żadnych specyfikacji.</p>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const przycisk = document.getElementById('przyciskOpisu');
        const opis = document.getElementById('opisProduktu');

        if (przycisk && opis) {
            if (opis.scrollHeight <= opis.clientHeight) {
                przycisk.style.display = 'none';
            }

            przycisk.addEventListener('click', function () {
                if (opis.classList.contains('opis-zwiniety')) {
                    opis.classList.remove('opis-zwiniety');
                    this.textContent = 'Zwiń opis';
                } else {
                    opis.classList.add('opis-zwiniety');
                    this.textContent = 'Rozwiń opis';
                }
            });
        }
    });
</script>
@endpush