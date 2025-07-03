<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Models\Zamowienie;
use App\Services\ZamowienieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ZamowienieController extends Controller
{
    private ZamowienieService $serwisZamowien;

    public function __construct(ZamowienieService $serwisZamowien)
    {
        $this->serwisZamowien = $serwisZamowien;
    }

    public function indexAdmin(Request $request)
    {
        $zamowienia = $this->serwisZamowien->pobierzWszystkie($request);
        
        return view('admin.zamowienia.index', ['zamowienia' => $zamowienia]);
    }

    public function showAdmin(int $id)
    {
        $zamowienie = $this->serwisZamowien->znajdzZamowieniePoId($id);
        return view('admin.zamowienia.show', ['zamowienie' => $zamowienie]);
    }

    public function zmienStatus(Request $request, int $id)
    {
        $zamowienie = $this->serwisZamowien->znajdzZamowieniePoId($id);

        if (in_array($zamowienie->Status, ['Zakończone', 'Anulowane'])) {
            return redirect()->back()->with('error', 'Nie można zmienić statusu zamówienia, które jest już zakończone lub anulowane.');
        }

        $request->validate(['Status' => 'required|string|max:50']);
        $this->serwisZamowien->zmienStatus($id, $request->Status);

        return redirect()->back()->with('status', 'Status zamówienia został zaktualizowany.');
    }

    public function create()
    {
        $koszyk = session('koszyk', []);
        if (empty($koszyk)) {
            return redirect()->route('home')->with('error', 'Twój koszyk jest pusty!');
        }

        $ids = array_keys($koszyk);
        $produkty = Produkt::find($ids);
        $sumaCalkowita = 0;

        foreach ($produkty as $produkt) {
            $sumaCalkowita += $produkt->Cena * $koszyk[$produkt->Id]['ilosc'];
        }

        return view('zamowienia.create', [
            'koszyk' => $koszyk,
            'produkty' => $produkty,
            'sumaCalkowita' => $sumaCalkowita
        ]);
    }

    public function store(Request $request)
    {
        $koszyk = session('koszyk', []);
        $ids = array_keys($koszyk);
        $produkty = Produkt::find($ids);
        $sumaCalkowita = 0;

        foreach ($produkty as $produkt) {
            $sumaCalkowita += $produkt->Cena * $koszyk[$produkt->Id]['ilosc'];
        }

        $noweZamowienie = null;

        DB::transaction(function () use ($request, $sumaCalkowita, $produkty, $koszyk, &$noweZamowienie) {
            $zamowienie = $request->user()->zamowienia()->create([
                'CalkowitaKwota' => $sumaCalkowita,
                'Status' => 'Nowe',
                'CzyAktywny' => true,
            ]);

            foreach ($produkty as $produkt) {
                $zamowienie->elementyZamowienia()->create([
                    'ProduktId' => $produkt->Id,
                    'Ilosc' => $koszyk[$produkt->Id]['ilosc'],
                    'Cena' => $produkt->Cena,
                ]);

                $produkt->decrement('IloscNaStanie', $koszyk[$produkt->Id]['ilosc']);
            }
            
            $noweZamowienie = $zamowienie;
        });

        $request->session()->forget('koszyk');

        return redirect()->route('zamowienia.show', $noweZamowienie)
                        ->with('success', 'Twoje zamówienie zostało pomyślnie złożone!');
    }

    public function show(Zamowienie $zamowienie)
    {
        if (Auth::id() !== $zamowienie->UzytkownikId) {
            abort(403, 'Brak dostępu do tego zasobu.');
        }

        $zamowienie->load('elementyZamowienia.produkt');

        return view('zamowienia.show', compact('zamowienie'));
    }
}