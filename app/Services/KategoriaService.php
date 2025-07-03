<?php

namespace App\Services;

use App\Models\Kategoria;

class KategoriaService
{
    public function pobierzWszystkie()
    {
        return Kategoria::withCount('produkty')
                        ->orderBy('Nazwa', 'asc')
                        ->get();
    }

    public function znajdzKategoriePoId(int $id)
    {
        return Kategoria::findOrFail($id);
    }

    public function stworzKategorie(array $dane)
    {
        return Kategoria::create($dane);
    }

    public function aktualizujKategorie(int $id, array $dane)
    {
        $kategoria = $this->znajdzKategoriePoId($id);
        $kategoria->update($dane);
        return $kategoria;
    }

    public function usunKategorie(int $id)
    {
        $kategoria = $this->znajdzKategoriePoId($id);

        if ($kategoria->produkty()->exists()) {
            return false;
        }

        $kategoria->delete();
        return true;
    }
}