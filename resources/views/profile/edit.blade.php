@extends('main', ['title' => 'Ustawienia Profilu'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="h2 mb-4">Ustawienia Profilu</h1>

            {{-- Dołączamy pierwszy, zaktualizowany formularz --}}
            <div class="mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Dołączamy drugi, zaktualizowany formularz --}}
            <div class="mb-4">
                @include('profile.partials.update-password-form')
            </div>

            {{-- Dołączamy trzecią, zaktualizowaną sekcję --}}
            <div class="mb-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection