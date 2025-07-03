<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\Request;
use App\Models\UlubionyProduktPivot;
use Illuminate\Support\Facades\DB;

class UlubioneController extends Controller
{
    public function index(Request $request)
    {
        $ulubioneProdukty = $request->user()->ulubioneProdukty()->get();

        return view('ulubione.index', ['produkty' => $ulubioneProdukty]);
    }

    public function store(Request $request, Produkt $produkt)
    {
        $uzytkownik = $request->user();

        if (!$uzytkownik->ulubioneProdukty()->where('UlubioneProdukty.ProduktId', $produkt->Id)->exists()) {

            $pivot = new UlubionyProduktPivot();
            $pivot->UzytkownikId = $uzytkownik->Id;
            $pivot->ProduktId = $produkt->Id;
            $pivot->DataUtworzenia = now();
            $pivot->save();
        }

        return redirect()->back()->with('status', 'Produkt dodany do ulubionych!');
    }

    public function destroy(Request $request, Produkt $produkt)
    {
        $request->user()->ulubioneProdukty()->detach($produkt->Id);

        return redirect()->back()->with('status', 'Produkt usunięto z ulubionych!');
    }

    public function toggleApi(Request $request, Produkt $produkt)
    {
        $uzytkownikId = $request->user()->Id;
        $produktId = $produkt->Id;

        $query = DB::table('UlubioneProdukty')
                    ->where('UzytkownikId', $uzytkownikId)
                    ->where('ProduktId', $produktId);

        if ($query->exists()) {
            $query->delete();
            $aktualnyStatus = false;
        } else {
            DB::table('UlubioneProdukty')->insert([
                'UzytkownikId' => $uzytkownikId,
                'ProduktId' => $produktId,
                'DataUtworzenia' => now()
            ]);
            $aktualnyStatus = true;
        }

        return response()->json([
            'status' => 'success',
            'czyPolubiono' => $aktualnyStatus,
        ]);
    }
}