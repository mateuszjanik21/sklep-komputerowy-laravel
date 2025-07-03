<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduktController;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\OpiniaController;
use App\Http\Controllers\KoszykController;
use App\Http\Controllers\UlubioneController;
use App\Http\Controllers\ZamowienieController;
use App\Http\Controllers\PublicKategorieController;
use App\Http\Controllers\KontaktController;
use App\Http\Controllers\AtrybutController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Trasy publiczne
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produkty', [ProduktController::class, 'index'])->name('produkty.index');
Route::get('/produkt/{produkt}', [ProduktController::class, 'showPublic'])->name('produkty.showPublic');
Route::get('/kategorie', [PublicKategorieController::class, 'index'])->name('kategorie.index');
Route::get('/kontakt', [KontaktController::class, 'index'])->name('kontakt.index');
Route::post('/kontakt', [KontaktController::class, 'send'])->name('kontakt.send');

// Trasy koszyka (publiczne)
Route::get('/koszyk', [KoszykController::class, 'index'])->name('koszyk.index');
Route::post('/koszyk/dodaj/{produkt}', [KoszykController::class, 'dodaj'])->name('koszyk.dodaj');
Route::patch('/koszyk/aktualizuj/{produkt}', [KoszykController::class, 'aktualizuj'])->name('koszyk.aktualizuj');
Route::delete('/koszyk/usun/{produkt}', [KoszykController::class, 'usun'])->name('koszyk.usun');

// Trasy dla zalogowanych użytkowników
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        $zamowienia = Auth::user()->zamowienia()->latest('DataUtworzenia')->get();
        return view('dashboard', ['zamowienia' => $zamowienia]);
    })->middleware('verified')->name('dashboard');

    // Ulubione
    Route::get('/ulubione', [UlubioneController::class, 'index'])->name('ulubione.index');
    Route::post('/ulubione/{produkt}', [UlubioneController::class, 'store'])->name('ulubione.store');
    Route::delete('/ulubione/{produkt}', [UlubioneController::class, 'destroy'])->name('ulubione.destroy');

    // Zamówienia
    Route::get('/zamowienia/nowe', [ZamowienieController::class, 'create'])->name('zamowienia.create');
    Route::post('/zamowienia', [ZamowienieController::class, 'store'])->name('zamowienia.store');
    Route::get('/zamowienia/{zamowienie}', [ZamowienieController::class, 'show'])->name('zamowienia.show');
    
    // Opinie
    Route::post('/opinie/{produkt}', [OpiniaController::class, 'store'])->name('opinie.store');
});

// Trasy API dla dynamicznych akcji
Route::post('/api/ulubione/toggle/{produkt}', [UlubioneController::class, 'toggleApi'])->middleware('auth');
Route::post('/api/koszyk/dodaj/{produkt}', [KoszykController::class, 'dodajApi']);

// Trasy dla admina
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/panel', [AdminDashboardController::class, 'index'])->name('panel');
    Route::get('/produkty/stworz', [ProduktController::class, 'create'])->name('produkty.create');
    Route::post('/produkty', [ProduktController::class, 'store'])->name('produkty.store');
    Route::get('/produkty', [ProduktController::class, 'indexAdmin'])->name('produkty.index');
    Route::get('/produkty/stworz', [ProduktController::class, 'create'])->name('produkty.create');
    Route::post('/produkty', [ProduktController::class, 'store'])->name('produkty.store');
    Route::get('/produkty/{id}/edytuj', [ProduktController::class, 'edit'])->name('produkty.edit');
    Route::put('/produkty/{id}', [ProduktController::class, 'update'])->name('produkty.update');
    Route::delete('/produkty/{id}', [ProduktController::class, 'destroy'])->name('produkty.destroy');
    Route::post('/produkty/{id}/przywroc', [ProduktController::class, 'restore'])->name('produkty.restore');
    Route::get('/produkty/{id}', [ProduktController::class, 'show'])->name('produkty.show');
    Route::patch('/produkty/{produkt}/toggle-status', [ProduktController::class, 'toggleStatus'])->name('produkty.toggleStatus');
    
    Route::get('/kategorie', [KategoriaController::class, 'index'])->name('kategorie.index');
    Route::get('/kategorie/create', [KategoriaController::class, 'create'])->name('kategorie.create');
    Route::post('/kategorie', [KategoriaController::class, 'store'])->name('kategorie.store');
    Route::get('/kategorie/{kategoria}', [KategoriaController::class, 'show'])->name('kategorie.show');
    Route::get('/kategorie/{kategoria}/edit', [KategoriaController::class, 'edit'])->name('kategorie.edit');
    Route::put('/kategorie/{kategoria}', [KategoriaController::class, 'update'])->name('kategorie.update');
    Route::delete('/kategorie/{kategoria}', [KategoriaController::class, 'destroy'])->name('kategorie.destroy');

    Route::post('/kategorie/{kategoria}/atrybuty', [AtrybutController::class, 'storeForCategory'])->name('atrybuty.storeForCategory');
    Route::get('/atrybuty', [AtrybutController::class, 'index'])->name('atrybuty.index');
    Route::get('/atrybuty/{atrybut}/edit', [AtrybutController::class, 'edit'])->name('atrybuty.edit');
    Route::put('/atrybuty/{atrybut}', [AtrybutController::class, 'update'])->name('atrybuty.update');
    Route::delete('/atrybuty/{atrybut}', [AtrybutController::class, 'destroy'])->name('atrybuty.destroy');

    Route::get('/opinie', [OpiniaController::class, 'index'])->name('opinie.index');
    Route::patch('/opinie/{id}/status', [OpiniaController::class, 'toggleStatus'])->name('opinie.toggleStatus');
    Route::delete('/opinie/{id}', [OpiniaController::class, 'destroy'])->name('opinie.destroy');

    Route::get('/zamowienia', function() { 
        return 'Strona zarządzania zamówieniami (w budowie)'; 
    })->name('zamowienia.index');

    Route::get('/zamowienia', [ZamowienieController::class, 'indexAdmin'])->name('zamowienia.index');
    Route::get('/zamowienia/{id}', [ZamowienieController::class, 'showAdmin'])->name('zamowienia.show');
    Route::patch('/zamowienia/{id}/status', [ZamowienieController::class, 'zmienStatus'])->name('zamowienia.zmienStatus');

    Route::get('/api/kategorie/{kategoria}/atrybuty', [AtrybutController::class, 'pobierzDlaKategorii'])->name('api.kategoria.atrybuty');
});

require __DIR__.'/auth.php';
