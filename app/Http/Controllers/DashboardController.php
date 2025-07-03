<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $uzytkownik = $request->user();

        $ostatnieZamowienie = $uzytkownik->zamowienia()->latest('DataUtworzenia')->first();

        return view('dashboard', [
            'uzytkownik' => $uzytkownik,
            'ostatnieZamowienie' => $ostatnieZamowienie
        ]);
    }
}