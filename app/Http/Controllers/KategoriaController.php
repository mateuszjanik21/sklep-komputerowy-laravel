<?php

namespace App\Http\Controllers;

use App\Services\KategoriaService;
use App\Models\Kategoria;
use App\Models\Atrybut;
use Illuminate\Http\Request;

class KategoriaController extends Controller
{
    private KategoriaService $serwisKategorii;

    public function __construct(KategoriaService $serwisKategorii)
    {
        $this->serwisKategorii = $serwisKategorii;
    }

    public function index()
    {
        $kategorie = Kategoria::withCount(['produkty', 'atrybuty'])
                        ->orderBy('Nazwa')
                        ->get();

    return view('admin.kategorie.index', ['kategorie' => $kategorie]);
    }

    public function create()
    {
        $wszystkieAtrybuty = Atrybut::all();
        return view('admin.kategorie.create');
    }

    public function store(Request $request)
    {
        $dane = $request->validate([
            'Nazwa' => 'required|string|max:100|unique:Kategorie,Nazwa',
            'Opis' => 'nullable|string',
            'Ikona' => 'nullable|string|max:100'
        ]);

        $kategoria = $this->serwisKategorii->stworzKategorie($dane);

        return redirect()->route('admin.kategorie.index')->with('status', 'Kategoria została pomyślnie dodana!');
    }

    public function edit(int $id)
    {
        $kategoria = $this->serwisKategorii->znajdzKategoriePoId($id);
        $wszystkieAtrybuty = Atrybut::all();
        return view('admin.kategorie.edit', [
            'kategoria' => $kategoria
        ]);
    }

    public function update(Request $request, int $id)
    {
        $dane = $request->validate([
            'Nazwa' => 'required|string|max:100|unique:Kategorie,Nazwa,' . $id . ',Id',
            'Opis' => 'nullable|string',
            'Ikona' => 'nullable|string|max:100'
        ]);

        $kategoria = $this->serwisKategorii->aktualizujKategorie($id, $dane);

        return redirect()->route('admin.kategorie.index')->with('status', 'Kategoria została pomyślnie zaktualizowana!');
    }

    public function destroy(int $id)
    {
        $sukces = $this->serwisKategorii->usunKategorie($id);

        if ($sukces) {
            return redirect()->route('admin.kategorie.index')->with('status', 'Kategoria została pomyślnie usunięta!');
        } else {
            return redirect()->route('admin.kategorie.index')->with('error', 'Nie można usunąć kategorii, ponieważ są do niej przypisane produkty.');
        }
    }
}