<?php

namespace App\Services;

use App\Models\Zamowienie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZamowienieService
{
    public function pobierzWszystkie(Request $request)
    {
        $query = Zamowienie::with('uzytkownik');

        $query->when($request->filled('status'), function ($q) use ($request) {
            return $q->where('Status', $request->status);
        });
        
        return $query->latest('DataUtworzenia')->paginate(10);
    }

    public function znajdzZamowieniePoId(int $id)
    {
        return Zamowienie::with(['uzytkownik', 'elementyZamowienia.produkt'])->findOrFail($id);
    }

    public function zmienStatus(int $id, string $nowyStatus)
    {
        DB::transaction(function () use ($id, $nowyStatus) {
            $zamowienie = $this->znajdzZamowieniePoId($id);
            $staryStatus = $zamowienie->Status;

            if (in_array($staryStatus, ['Zakończone', 'Anulowane'])) {
                return;
            }

            if ($nowyStatus === 'Anulowane' && $staryStatus !== 'Anulowane') {
                foreach ($zamowienie->elementyZamowienia as $element) {
                    if ($element->produkt) {
                        $element->produkt->IloscNaStanie += $element->Ilosc;
                        $element->produkt->save();
                    }
                }
            }

            $zamowienie->Status = $nowyStatus;
            $zamowienie->save();
        });
    }
}
