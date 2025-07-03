<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Id
 * @property int $ProduktId
 * @property int $UzytkownikId
 * @property int $Ocena
 * @property string|null $Komentarz
 * @property \Illuminate\Support\Carbon $DataUtworzenia
 * @property \Illuminate\Support\Carbon $DataModyfikacji
 * @property int $CzyAktywny
 * @property-read \App\Models\Produkt $produkt
 * @property-read \App\Models\Uzytkownik $uzytkownik
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereCzyAktywny($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereDataModyfikacji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereDataUtworzenia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereKomentarz($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereOcena($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereProduktId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OpiniaProduktu whereUzytkownikId($value)
 * @mixin \Eloquent
 */
class OpiniaProduktu extends Model
{
    use HasFactory;

    protected $table = 'OpinieProduktow';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'DataUtworzenia';
    const UPDATED_AT = 'DataModyfikacji';

    protected $fillable = [
        'UzytkownikId',
        'Ocena',
        'Komentarz',
        'CzyAktywny',
    ];

    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'ProduktId');
    }

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'UzytkownikId');
    }

    protected $casts = [
        'DataUtworzenia' => 'datetime',
    ];
}