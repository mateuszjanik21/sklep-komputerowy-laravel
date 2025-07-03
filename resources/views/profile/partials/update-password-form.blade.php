<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Zmień hasło</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Upewnij się, że Twoje konto używa długiego, losowego hasła, aby pozostać bezpiecznym.
        </p>

        <form method="post" action="{{ route('password.update') }}" class="mt-4">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">Aktualne hasło</label>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                @if ($errors->updatePassword->get('current_password'))
                    <div class="text-danger mt-2">{{ $errors->updatePassword->first('current_password') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="update_password_password" class="form-label">Nowe hasło</label>
                <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                @if ($errors->updatePassword->get('password'))
                    <div class="text-danger mt-2">{{ $errors->updatePassword->first('password') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label">Potwierdź nowe hasło</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                @if ($errors->updatePassword->get('password_confirmation'))
                    <div class="text-danger mt-2">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-4">
                <button type="submit" class="btn btn-primary">Zapisz</button>
                @if (session('status') === 'password-updated')
                    <p class="text-success mb-0">Zapisano.</p>
                @endif
            </div>
        </form>
    </div>
</div>