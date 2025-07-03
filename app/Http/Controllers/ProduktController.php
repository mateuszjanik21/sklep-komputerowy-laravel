<?php

namespace App\Http\Controllers;

use App\Services\ProduktService;
use App\Models\Kategoria;
use App\Models\Produkt;
use App\Models\Atrybut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduktController extends Controller
{
    private ProduktService $serwisProduktow;

    public function __construct(ProduktService $serwisProduktow)
    {
        $this->serwisProduktow = $serwisProduktow;
    }

    public function index(Request $request)
    {
        $produkty = $this->serwisProduktow->pobierzWszystkieAktywne($request);
        $kategorie = Kategoria::all();
        
        $ulubioneIds = [];
        if (Auth::check()) {
            $ulubioneIds = Auth::user()->ulubioneProdukty()->pluck('ProduktId')->toArray();
        }

        return view('produkty.index', [
            'produkty' => $produkty,
            'kategorie' => $kategorie,
            'ulubioneIds' => $ulubioneIds
        ]);
    }

    public function create()
    {
        $kategorie = Kategoria::all();
        $atrybuty = Atrybut::all();
        return view('admin.produkty.create', [
            'kategorie' => $kategorie,
            'atrybuty' => $atrybuty
        ]);
    }

    public function store(Request $request)
    {
        $dane = $request->validate([
            'Nazwa' => 'required|string|max:255',
            'Opis' => 'required|string',
            'Cena' => 'required|numeric|min:0',
            'IloscNaStanie' => 'required|integer|min:0',
            'KategoriaId' => 'required|integer|exists:Kategorie,Id',
            'SKU' => 'required|string|unique:Produkty,SKU',
            'UrlZdjecia' => 'nullable|url',
        ]);

        $produkt = $this->serwisProduktow->stworzProdukt($dane);

        if ($request->has('specyfikacje')) {
            foreach ($request->specyfikacje as $spec) {
                $produkt->atrybuty()->attach($spec['atrybut_id'], ['Wartosc' => $spec['wartosc']]);
            }
        }

        return redirect()->route('admin.produkty.index')->with('status', 'Produkt został pomyślnie dodany!');
    }

    public function indexAdmin(Request $request)
    {
        $produkty = $this->serwisProduktow->pobierzWszystkie($request);
        $kategorie = Kategoria::all();

        return view('admin.produkty.index', [
            'produkty' => $produkty,
            'kategorie' => $kategorie
        ]);
    }

    public function edit(int $id)
    {
        $produkt = $this->serwisProduktow->znajdzProduktPoId($id);
        $kategorie = Kategoria::all();
        $atrybuty = Atrybut::all();
        $przypisaneAtrybuty = $produkt->atrybuty()->get()->keyBy('id');

        return view('admin.produkty.edit', [
            'produkt' => $produkt,
            'kategorie' => $kategorie,
            'atrybuty' => $atrybuty,
            'przypisaneAtrybuty' => $przypisaneAtrybuty
        ]);
    }

    public function update(Request $request, int $id)
    {
        $dane = $request->validate([
            'Nazwa' => 'required|string|max:255',
            'Opis' => 'required|string',
            'Cena' => 'required|numeric|min:0',
            'IloscNaStanie' => 'required|integer|min:0',
            'KategoriaId' => 'required|integer|exists:Kategorie,Id',
            'SKU' => 'required|string|unique:Produkty,SKU,' . $id . ',Id',
            'UrlZdjecia' => 'nullable|url',
        ]);

        $produkt = $this->serwisProduktow->aktualizujProdukt($id, $dane);
        $daneSpecyfikacji = [];
        if ($request->has('specyfikacje')) {
            foreach ($request->specyfikacje as $spec) {
                $daneSpecyfikacji[$spec['atrybut_id']] = ['Wartosc' => $spec['wartosc']];
            }
        }
        $produkt->atrybuty()->sync($daneSpecyfikacji);

        return redirect()->route('admin.produkty.index')->with('status', 'Produkt został pomyślnie zaktualizowany!');
    }

    public function destroy(int $id)
    {
        $this->serwisProduktow->dezaktywujProdukt($id);
        return redirect()->route('admin.produkty.index')->with('status', 'Produkt został pomyślnie usunięty.');
    }

    public function restore(int $id)
    {
        $this->serwisProduktow->aktywujProdukt($id);
        return redirect()->route('admin.produkty.index')->with('status', 'Produkt został pomyślnie przywrócony.');
    }

    public function show(int $id)
    {
        $produkt = $this->serwisProduktow->znajdzProduktPoId($id);
        return view('admin.produkty.show', ['produkt' => $produkt]);
    }

    public function showPublic(Request $request, int $id)
    {
        $produkt = $this->serwisProduktow->znajdzProduktPoId($id);
        if (!$produkt->CzyAktywny) {
            abort(404);
        }

        $opinie = $produkt->opinie()
                            ->where('CzyAktywny', true)
                            ->with('uzytkownik')
                            ->latest('DataUtworzenia')
                            ->get();

        $isUlubiony = false;
        $uzytkownikJuzOcenil = false;

        if ($request->user()) {
            $uzytkownik = $request->user();
            $isUlubiony = $uzytkownik->ulubioneProdukty()->where('UlubioneProdukty.ProduktId', $id)->exists();
            $uzytkownikJuzOcenil = $produkt->opinie()->where('UzytkownikId', $uzytkownik->Id)->exists();
        }

        $polecaneProdukty = Produkt::where('KategoriaId', $produkt->KategoriaId)
                                            ->where('Id', '!=', $id)
                                            ->where('CzyAktywny', true)
                                            ->inRandomOrder()
                                            ->limit(4)
                                            ->get();

        return view('produkty.show', [
            'produkt' => $produkt,
            'opinie' => $opinie,
            'isUlubiony' => $isUlubiony,
            'uzytkownikJuzOcenil' => $uzytkownikJuzOcenil,
            'polecaneProdukty' => $polecaneProdukty
        ]);
    }

    public function pobierzPolecaneApi(ProduktService $serwisProduktow)
    {
        $polecaneProdukty = $serwisProduktow->pobierzWyróżnione(4);
        
        return response()->json($polecaneProdukty);
    }
}