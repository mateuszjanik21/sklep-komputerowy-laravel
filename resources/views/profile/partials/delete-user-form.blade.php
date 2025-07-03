<div class="card shadow-sm border-0 bg-light">
    <div class="card-header py-3">
        <h5 class="mb-0 text-danger">Usuń konto</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Gdy Twoje konto zostanie usunięte, wszystkie jego zasoby i dane zostaną trwale usunięte. Przed usunięciem konta, pobierz wszelkie dane lub informacje, które chcesz zachować.
        </p>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
            Usuń konto
        </button>
    </div>
</div>

<div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
            @csrf
            @method('delete')

            <div class="modal-header">
                <h5 class="modal-title" id="confirm-user-deletion-label">Czy na pewno chcesz usunąć swoje konto?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Gdy Twoje konto zostanie usunięte, wszystkie jego zasoby i dane zostaną trwale usunięte. Wprowadź swoje hasło, aby potwierdzić, że chcesz trwale usunąć swoje konto.
                </p>
                <div class="mt-3">
                    <label for="password" class="form-label visually-hidden">Hasło</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Hasło"
                    >
                    @if ($errors->userDeletion->get('password'))
                        <div class="text-danger mt-2">{{ $errors->userDeletion->first('password') }}</div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-danger">Usuń konto</button>
            </div>
        </form>
    </div>
</div>