<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Id
 * @property int $KategoriaId
 * @property string $Nazwa
 * @property string $Opis
 * @property string $Cena
 * @property int $IloscNaStanie
 * @property string $SKU
 * @property string|null $UrlZdjecia
 * @property \Illuminate\Support\Carbon $DataUtworzenia
 * @property \Illuminate\Support\Carbon $DataModyfikacji
 * @property int $CzyAktywny
 * @property-read \App\Models\Kategoria $kategoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OpiniaProduktu> $opinie
 * @property-read int|null $opinie_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Uzytkownik> $ulubionyPrzezUzytkownikow
 * @property-read int|null $ulubiony_przez_uzytkownikow_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereCena($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereCzyAktywny($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereDataModyfikacji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereDataUtworzenia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereIloscNaStanie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereKategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereNazwa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereOpis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereSKU($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produkt whereUrlZdjecia($value)
 * @mixin \Eloquent
 */
class Produkt extends Model
{
    use HasFactory;

    protected $table = 'Produkty';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'DataUtworzenia';
    const UPDATED_AT = 'DataModyfikacji';

    protected $fillable = [
        'Nazwa',
        'Opis',
        'Cena',
        'IloscNaStanie',
        'KategoriaId',
        'SKU',
        'UrlZdjecia',
    ];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class, 'KategoriaId');
    }

    public function opinie()
    {
        return $this->hasMany(OpiniaProduktu::class, 'ProduktId');
    }

    public function atrybuty()
    {
        return $this->belongsToMany(Atrybut::class, 'ProduktAtrybut', 'ProduktId', 'AtrybutId')
                    ->withPivot('Wartosc');
    }

    public function ulubionyPrzezUzytkownikow()
    {
        return $this->belongsToMany(Uzytkownik::class, 'UlubioneProdukty', 'ProduktId', 'UzytkownikId')
                    ->using(UlubionyProduktPivot::class)
                    ->withPivot('DataUtworzenia');
    }
}