<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\OpiniaProduktu;
use App\Models\Produkt;
use App\Models\Uzytkownik;
use App\Models\Zamowienie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $poczatekTygodnia = now()->startOfWeek(Carbon::MONDAY);
        $koniecTygodnia = now()->endOfWeek(Carbon::SUNDAY);

        $sprzedazTygodniowa = Zamowienie::select(
                DB::raw('DATE(DataUtworzenia) as data'),
                DB::raw('SUM(CalkowitaKwota) as suma')
            )
            ->whereBetween('DataUtworzenia', [$poczatekTygodnia, $koniecTygodnia])
            ->groupBy('data')
            ->get()
            ->keyBy('data');

        $tlumaczenieDni = [
            'Monday'    => 'Pon',
            'Tuesday'   => 'Wt',
            'Wednesday' => 'Śr',
            'Thursday'  => 'Czw',
            'Friday'    => 'Pt',
            'Saturday'  => 'Sob',
            'Sunday'    => 'Niedz',
        ];

        $datyWykresu = [];
        $sumyWykresu = [];

        for ($dzien = $poczatekTygodnia->copy(); $dzien->lte($koniecTygodnia); $dzien->addDay()) {
            $angielskaNazwaDnia = $dzien->format('l'); 
            $datyWykresu[] = $tlumaczenieDni[$angielskaNazwaDnia] ?? 'Błąd';
            
            $dataKlucz = $dzien->format('Y-m-d');
            $sumyWykresu[] = $sprzedazTygodniowa->has($dataKlucz) ? round($sprzedazTygodniowa[$dataKlucz]->suma, 2) : 0;
        }

        return view('admin.panel', [
            'aktualnaData' => now(),
            'liczbaProduktow' => Produkt::count(),
            'liczbaKategorii' => Kategoria::count(),
            'liczbaUzytkownikow' => Uzytkownik::where('CzyAdmin', false)->count(),
            'ostatnieOpinie' => OpiniaProduktu::with('produkt', 'uzytkownik')->latest('DataUtworzenia')->limit(5)->get(),
            'ostatnieZamowienia' => Zamowienie::with('uzytkownik')->latest('DataUtworzenia')->limit(5)->get(),
            'datyWykresu' => $datyWykresu,
            'sumyWykresu' => $sumyWykresu
        ]);
    }
}
