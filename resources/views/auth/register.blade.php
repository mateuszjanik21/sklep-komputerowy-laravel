@extends('main', ['title' => 'Rejestracja'])

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <h2 class="card-title text-center mb-4">Stwórz nowe konto</h2>

                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="Nazwa" class="form-label">Nazwa użytkownika</label>
                        <input id="Nazwa" class="form-control" type="text" name="Nazwa" value="{{ old('Nazwa') }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">Adres e-mail</label>
                        <input id="Email" class="form-control" type="email" name="Email" value="{{ old('Email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Hasło</label>
                        <input id="password" class="form-control" type="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Potwierdź hasło</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Zarejestruj się
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <a class="text-muted text-decoration-none" href="{{ route('login') }}">
                            Masz już konto? Zaloguj się
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection