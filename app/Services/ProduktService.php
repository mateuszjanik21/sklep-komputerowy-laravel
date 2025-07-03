<?php

namespace App\Services;

use App\Models\Produkt;
use Illuminate\Http\Request;

class ProduktService
{
    public function pobierzWszystkieAktywne(Request $request)
    {
        $query = Produkt::with(['kategoria', 'atrybuty'])
                        ->withAvg('opinie', 'Ocena')
                        ->withCount('opinie');

        $query->when($request->filled('szukaj'), function ($q) use ($request) {
            $szukanaFraza = '%' . $request->szukaj . '%';
            $q->where('Nazwa', 'like', $szukanaFraza);
        });

        $query->when($request->filled('kategoria'), function ($q) use ($request) {
            $q->where('KategoriaId', $request->kategoria);
        });

        return $query->orderBy('DataUtworzenia', 'desc')->paginate(12);
    }

    public function stworzProdukt(array $dane)
    {
        return Produkt::create($dane);
    }

    public function pobierzWszystkie(Request $request)
    {
        $query = Produkt::with(['kategoria', 'atrybuty'])
                        ->withAvg('opinie', 'Ocena')
                        ->withCount('opinie');

        $query->when($request->filled('szukaj'), function ($q) use ($request) {
            $szukanaFraza = '%' . $request->szukaj . '%';
            $q->where(function ($q2) use ($szukanaFraza) {
                $q2->where('Nazwa', 'like', $szukanaFraza)
                ->orWhere('SKU', 'like', $szukanaFraza);
            });
        });

        $query->when($request->filled('kategoria_id'), function ($q) use ($request) {
            return $q->where('KategoriaId', $request->kategoria_id);
        });

        return $query->orderBy('DataUtworzenia', 'desc')->paginate(10);
    }

    public function znajdzProduktPoId(int $id)
    {
        return Produkt::with('atrybuty')
                    ->withCount(['ulubionyPrzezUzytkownikow', 'opinie'])
                    ->findOrFail($id);
    }

    public function aktualizujProdukt(int $id, array $dane)
    {
        $produkt = $this->znajdzProduktPoId($id);
        $produkt->update($dane);
        return $produkt;
    }

    public function dezaktywujProdukt(int $id)
    {
        $produkt = $this->znajdzProduktPoId($id);
        $produkt->CzyAktywny = false;
        $produkt->save();
    }

    public function aktywujProdukt(int $id)
    {
        $produkt = $this->znajdzProduktPoId($id);
        $produkt->CzyAktywny = true;
        $produkt->save();
    }

    public function pobierzNajnowszeAktywne(int $limit = 8)
    {
        return Produkt::with('kategoria')
                    ->where('CzyAktywny', true)
                    ->withAvg('opinie', 'Ocena')
                    ->withCount('opinie')
                    ->latest('DataUtworzenia')
                    ->limit($limit)
                    ->get();
    }

    public function pobierzWyróżnione(int $limit = 4)
    {
        return Produkt::with('kategoria')
                    ->where('CzyAktywny', true)
                    ->withAvg('opinie', 'Ocena')
                    ->withCount('opinie')
                    ->inRandomOrder()
                    ->limit($limit)
                    ->get();
    }
}