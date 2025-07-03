<?php

namespace App\Http\Controllers;

use App\Services\AtrybutService;
use App\Models\Kategoria;
use App\Models\Atrybut;
use Illuminate\Http\Request;

class AtrybutController extends Controller
{
    private AtrybutService $serwisAtrybutow;

    public function __construct(AtrybutService $serwisAtrybutow)
    {
        $this->serwisAtrybutow = $serwisAtrybutow;
    }

    public function index()
    {
        $kategorie = Kategoria::with('atrybuty')->orderBy('Nazwa')->get();
        return view('admin.atrybuty.index', ['kategorie' => $kategorie]);
    }

    public function create()
    {
        $kategorie = Kategoria::all();
        return view('admin.atrybuty.create', ['kategorie' => $kategorie]);
    }

    public function edit(int $id)
    {
        $atrybut = $this->serwisAtrybutow->znajdzAtrybutPoId($id);
        $kategorie = Kategoria::all();
        return view('admin.atrybuty.edit', [
            'atrybut' => $atrybut,
            'kategorie' => $kategorie
        ]);
    }

    public function update(Request $request, int $id)
    {
        $dane = $request->validate([
            'Nazwa' => 'required|string|max:100|unique:Atrybuty,Nazwa,' . $id . ',Id',
            'kategorie' => 'required|array'
        ]);

        $atrybut = $this->serwisAtrybutow->aktualizujAtrybut($id, $dane);
        $atrybut->kategorie()->sync($request->kategorie);

        return redirect()->route('admin.atrybuty.index')->with('status', 'Atrybut został pomyślnie zaktualizowany!');
    }

    public function destroy(int $id)
    {
        $this->serwisAtrybutow->usunAtrybut($id);
        return redirect()->route('admin.atrybuty.index')->with('status', 'Atrybut został pomyślnie usunięty!');
    }

    public function pobierzDlaKategorii(Kategoria $kategoria)
    {
        return response()->json($kategoria->atrybuty()->get());
    }

    public function storeForCategory(Request $request, Kategoria $kategoria)
    {
        $dane = $request->validate([
            'Nazwa' => 'required|string|max:100'
        ]);

        $atrybut = Atrybut::firstOrCreate(['Nazwa' => $dane['Nazwa']]);

        $atrybut->kategorie()->syncWithoutDetaching([$kategoria->Id]);

        return response()->json($atrybut);
    }
}