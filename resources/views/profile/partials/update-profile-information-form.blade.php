<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Informacje o profilu</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Zaktualizuj informacje o swoim koncie oraz adres e-mail.
        </p>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-4">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">Nazwa użytkownika</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
                @if ($errors->get('name'))
                    <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @if ($errors->get('email'))
                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-muted">
                            Twój adres e-mail jest niezweryfikowany.
                            <button form="send-verification" class="btn btn-link p-0 text-decoration-none">
                                Kliknij tutaj, aby ponownie wysłać link weryfikacyjny.
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 fw-medium text-sm text-success">
                            Nowy link weryfikacyjny został wysłany na Twój adres e-mail.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-4">
                <button type="submit" class="btn btn-primary">Zapisz</button>
                @if (session('status') === 'profile-updated')
                    <p class="text-success mb-0">Zapisano.</p>
                @endif
            </div>
        </form>
    </div>
</div>