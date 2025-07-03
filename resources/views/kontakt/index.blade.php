@extends('main', ['title' => 'Kontakt'])

@section('content')
    <div class="p-4 p-md-5 mb-4 rounded-3 bg-light">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold">Skontaktuj się z nami</h1>
            <p class="col-md-8 fs-5">
                Masz pytania dotyczące naszych produktów lub swojego zamówienia? Jesteśmy do Twojej dyspozycji.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h4>Formularz kontaktowy</h4>
                    <form action="{{ route('kontakt.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Twój adres e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="temat" class="form-label">Temat wiadomości</label>
                            <input type="text" class="form-control" id="temat" name="temat" required>
                        </div>
                        <div class="mb-3">
                            <label for="wiadomosc" class="form-label">Treść wiadomości</label>
                            <textarea class="form-control" id="wiadomosc" name="wiadomosc" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Wyślij wiadomość</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h4>Nasza lokalizacja</h4>
                    <p>Zapraszamy do naszego punktu stacjonarnego:</p>
                    <address>
                        <strong>Sklep Komputerowy PC-MAX</strong><br>
                        ul. Komputerowa 123<br>
                        33-300 Nowy Sącz<br>
                        Polska
                    </address>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2583.561125211246!2d20.69458991570252!3d49.62531647937016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473de4f535562d9b%3A0x295a6c1157147647!2sNowy%20S%C4%85cz%20Town%20Hall!5e0!3m2!1sen!2spl!4v1656277853489!5m2!1sen!2spl" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
