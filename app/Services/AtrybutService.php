<?php

namespace App\Services;

use App\Models\Atrybut;

class AtrybutService
{
    public function pobierzWszystkie()
    {
        return Atrybut::orderBy('Nazwa', 'asc')->get();
    }

    public function znajdzAtrybutPoId(int $id)
    {
        return Atrybut::findOrFail($id);
    }

    public function stworzAtrybut(array $dane)
    {
        return Atrybut::create($dane);
    }

    public function aktualizujAtrybut(int $id, array $dane)
    {
        $atrybut = $this->znajdzAtrybutPoId($id);
        $atrybut->update($dane);
        return $atrybut;
    }

    public function usunAtrybut(int $id)
    {
        $atrybut = $this->znajdzAtrybutPoId($id);
        $atrybut->delete();
    }
}