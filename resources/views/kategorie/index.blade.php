@extends('main', ['title' => 'Kategorie produktów'])

@push('styles')
<style>
    .category-card {
        display: block;
        position: relative;
        height: 250px;
        border-radius: .5rem;
        overflow: hidden;
        background-color: #343a40; /* Domyślny kolor tła */
        background-size: cover;
        background-position: center;
        text-decoration: none;
        color: white;
        transition: transform 0.3s ease-in-out;
    }
    .category-card:hover {
        transform: scale(1.03);
    }
    .category-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.1) 60%, rgba(0,0,0,0.1) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1.5rem;
    }
    .category-card .card-title {
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    .category-card .product-count {
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
    }
</style>
@endpush

@section('content')
    <div class="p-4 p-md-5 mb-4 rounded-3 bg-light">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold">Kategorie Produktów</h1>
            <p class="col-md-8 fs-5">
                Przeglądaj nasz asortyment, wybierając jedną z poniższych kategorii, aby znaleźć dokładnie to, czego szukasz.
            </p>
        </div>
    </div>

    @if($kategorie->isNotEmpty())
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($kategorie as $kategoria)
                <div class="col">
                    @php
                        $slug = Str::slug($kategoria->Nazwa);
                        $imageUrl = asset("images/kategorie/{$slug}.jpg");
                    @endphp
                    
                    <a href="{{ route('produkty.index', ['kategoria' => $kategoria->Id]) }}" class="category-card" style="background-image: url('{{ $imageUrl }}')">
                        <div class="category-card-overlay">
                            <h2 class="card-title h4">{{ $kategoria->Nazwa }}</h2>
                            <p class="product-count align-self-start">
                                {{ $kategoria->produkty_count }} {{ Str::plural('produkt', $kategoria->produkty_count) }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Aktualnie w sklepie nie ma żadnych kategorii produktów.</div>
    @endif
@endsection