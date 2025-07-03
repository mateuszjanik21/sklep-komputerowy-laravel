<?php

namespace App\Http\Controllers;

use App\Services\ProduktService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(ProduktService $serwisProduktow)
    {
        $najnowszeProdukty = $serwisProduktow->pobierzNajnowszeAktywne(8);
        $polecaneProdukty = $serwisProduktow->pobierzWyróżnione(4);

        $ulubioneIds = [];
        if (Auth::check()) {
            $ulubioneIds = Auth::user()->ulubioneProdukty()->pluck('ProduktId')->toArray();
        }
    
        return view('home.index', [
            'najnowszeProdukty' => $najnowszeProdukty,
            'polecaneProdukty' => $polecaneProdukty,
            'ulubioneIds' => $ulubioneIds
        ]);
    }
}