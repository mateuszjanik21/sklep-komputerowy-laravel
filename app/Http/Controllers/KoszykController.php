<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\Request;

class KoszykController extends Controller
{
    public function index()
    {
        $koszyk = session('koszyk', []);
        $ids = array_keys($koszyk);
        $produkty = Produkt::find($ids);

        $daneDoWidoku = [];
        $sumaCalkowita = 0;

        if($produkty) {
            foreach($produkty as $produkt) {
                $ilosc = $koszyk[$produkt->Id]['ilosc'];
                $sumaPozycji = $produkt->Cena * $ilosc;
                $sumaCalkowita += $sumaPozycji;

                $daneDoWidoku[] = [
                    'produkt' => $produkt,
                    'ilosc' => $ilosc,
                    'suma_pozycji' => $sumaPozycji
                ];
            }
        }

        return view('koszyk.index', [
            'koszyk' => $daneDoWidoku,
            'sumaCalkowita' => $sumaCalkowita
        ]);
    }

    public function dodaj(Request $request, Produkt $produkt)
    {
        $request->validate([
            'ilosc' => 'required|integer|min:1|max:' . $produkt->IloscNaStanie
        ]);
        $ilosc = (int)$request->input('ilosc');

        $koszyk = session('koszyk', []);

        if (isset($koszyk[$produkt->Id])) {
            $koszyk[$produkt->Id]['ilosc'] += $ilosc;
        } else {
            $koszyk[$produkt->Id] = [
                'ilosc' => $ilosc,
            ];
        }
        
        if ($koszyk[$produkt->Id]['ilosc'] > $produkt->IloscNaStanie) {
            $koszyk[$produkt->Id]['ilosc'] = $produkt->IloscNaStanie;
        }

        session(['koszyk' => $koszyk]);

        return redirect()->back()->with('status', 'Produkt dodany do koszyka!');
    }

    public function aktualizuj(Request $request, Produkt $produkt)
    {
        $request->validate([
            'ilosc' => 'required|integer|min:1|max:' . $produkt->IloscNaStanie,
        ]);

        $koszyk = session('koszyk', []);

        if (isset($koszyk[$produkt->Id])) {
            $koszyk[$produkt->Id]['ilosc'] = $request->ilosc;
            session(['koszyk' => $koszyk]);
            return redirect()->back()->with('status', 'Ilość produktu została zaktualizowana.');
        }

        return redirect()->back()->with('error', 'Nie znaleziono produktu w koszyku.');
    }

    public function usun(Produkt $produkt)
    {
        $koszyk = session('koszyk', []);

        if (isset($koszyk[$produkt->Id])) {
            unset($koszyk[$produkt->Id]);
            session(['koszyk' => $koszyk]);
            return redirect()->back()->with('status', 'Produkt został usunięty z koszyka.');
        }
        
        return redirect()->back()->with('error', 'Nie znaleziono produktu w koszyku.');
    }

    public function dodajApi(Request $request, Produkt $produkt)
    {
        $request->validate(['ilosc' => 'required|integer|min:1|max:' . $produkt->IloscNaStanie]);
        $ilosc = (int)$request->input('ilosc', 1);

        $koszyk = session('koszyk', []);

        if (isset($koszyk[$produkt->Id])) {
            $koszyk[$produkt->Id]['ilosc'] += $ilosc;
        } else {
            $koszyk[$produkt->Id] = ['ilosc' => $ilosc];
        }

        if ($koszyk[$produkt->Id]['ilosc'] > $produkt->IloscNaStanie) {
            $koszyk[$produkt->Id]['ilosc'] = $produkt->IloscNaStanie;
        }
        
        session(['koszyk' => $koszyk]);

        return response()->json([
            'status' => 'success',
            'message' => 'Produkt dodany do koszyka!',
        ]);
    }
}