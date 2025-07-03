<?php

namespace App\Services;

use App\Models\OpiniaProduktu;
use Illuminate\Http\Request;

class OpiniaService
{
    public function pobierzWszystkie(Request $request)
    {
        $query = OpiniaProduktu::with(['produkt.kategoria', 'uzytkownik']);

        $query->when($request->filled('kategoria_id'), function ($q) use ($request) {
            return $q->whereHas('produkt', function($q2) use ($request) {
                $q2->where('KategoriaId', $request->kategoria_id);
            });
        });

        if ($request->input('sortowanie') === 'stare') {
            $query->orderBy('DataUtworzenia', 'asc');
        } else {
            $query->orderBy('DataUtworzenia', 'desc');
        }

        return $query->paginate(9);
    }

    public function znajdzOpiniePoId(int $id)
    {
        return OpiniaProduktu::findOrFail($id);
    }

    public function zmienStatus(int $id)
    {
        $opinia = $this->znajdzOpiniePoId($id);
        $opinia->CzyAktywny = !$opinia->CzyAktywny;
        $opinia->save();
    }

    public function usunTrwale(int $id)
    {
        $opinia = $this->znajdzOpiniePoId($id);
        $opinia->delete();
    }
}