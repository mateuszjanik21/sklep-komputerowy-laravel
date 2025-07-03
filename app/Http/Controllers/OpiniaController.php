<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\Request;
use App\Models\Kategoria; 
use App\Services\OpiniaService;

class OpiniaController extends Controller
{
    private OpiniaService $serwisOpinii;

    public function __construct(OpiniaService $serwisOpinii)
    {
        $this->serwisOpinii = $serwisOpinii;
    }

    public function index(Request $request)
{
    $opinie = $this->serwisOpinii->pobierzWszystkie($request);
    $kategorie = Kategoria::all();

    return view('admin.opinie.index', [
        'opinie' => $opinie,
        'kategorie' => $kategorie
    ]);
}

    public function toggleStatus(int $id)
    {
        $this->serwisOpinii->zmienStatus($id);

        $opinia = $this->serwisOpinii->znajdzOpiniePoId($id);

        return response()->json([
            'success' => true,
            'nowyStatus' => $opinia->CzyAktywny,
            'statusText' => $opinia->CzyAktywny ? 'Widoczna' : 'Ukryta',
            'przyciskText' => $opinia->CzyAktywny ? 'Ukryj' : 'Pokaż'
        ]);
    }

    public function destroy(int $id)
    {
        $this->serwisOpinii->usunTrwale($id);
        return redirect()->back()->with('status', 'Opinia została trwale usunięta.');
    }

    public function store(Request $request, Produkt $produkt)
    {
        $istniejacaOpinia = $produkt->opinie()->where('UzytkownikId', $request->user()->Id)->exists();
        if ($istniejacaOpinia) {
            return redirect()->back()->with('error', 'Już oceniłeś ten produkt.');
        }

        $dane = $request->validate([
            'Ocena' => 'required|integer|min:1|max:5',
            'Komentarz' => 'nullable|string|max:2000',
        ]);

        $produkt->opinie()->create([
            'UzytkownikId' => $request->user()->Id,
            'Ocena' => $dane['Ocena'],
            'Komentarz' => $dane['Komentarz'],
            'CzyAktywny' => true,
        ]);

        return redirect()->back()->with('status', 'Dziękujemy za dodanie opinii!');
    }
}