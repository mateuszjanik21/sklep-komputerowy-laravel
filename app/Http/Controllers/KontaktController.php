<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontaktController extends Controller
{
    public function index()
    {
        return view('kontakt.index');
    }

    public function send(Request $request)
    {
        return redirect()->route('kontakt.index')->with('status', 'Dziękujemy za wiadomość! Odpowiemy najszybciej, jak to możliwe.');
    }
}
