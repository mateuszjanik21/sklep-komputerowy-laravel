@extends('main', ['title' => 'Dziękujemy za zamówienie!'])

@section('content')
    <div class="text-center p-5 bg-light rounded-3">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 80px;"></i>
        <h1 class="display-5 fw-bold mt-4">Dziękujemy za Twoje zamówienie!</h1>
        <p class="lead col-md-8 mx-auto">
            Właśnie rozpoczęliśmy jego przetwarzanie. Potwierdzenie wysłaliśmy na Twój adres e-mail: <strong>{{ Auth::user()->Email }}</strong>.
        </p>
        <hr class="my-4">
        
        <h5>Co dalej?</h5>
        <div class="row mt-3 text-start">
            <div class="col-md-4"><strong>1. Realizacja:</strong><p class="text-muted">Kompletujemy Twoje produkty.</p></div>
            <div class="col-md-4"><strong>2. Wysyłka:</strong><p class="text-muted">Gdy paczka będzie gotowa, otrzymasz powiadomienie.</p></div>
            <div class="col-md-4"><strong>3. Dostawa:</strong><p class="text-muted">Kurier dostarczy przesyłkę pod Twoje drzwi.</p></div>
        </div>

        <div class="d-flex gap-2 justify-content-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Wróć na stronę główną</a>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-lg">Zobacz moje zamówienia</a>
        </div>
    </div>
@endsection