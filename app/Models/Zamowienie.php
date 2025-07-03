<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Id
 * @property int $UzytkownikId
 * @property string $Status
 * @property string $CalkowitaKwota
 * @property \Illuminate\Support\Carbon $DataUtworzenia
 * @property \Illuminate\Support\Carbon $DataModyfikacji
 * @property int $CzyAktywny
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ElementZamowienia> $elementyZamowienia
 * @property-read int|null $elementy_zamowienia_count
 * @property-read \App\Models\Uzytkownik $uzytkownik
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereCalkowitaKwota($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereCzyAktywny($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereDataModyfikacji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereDataUtworzenia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zamowienie whereUzytkownikId($value)
 * @mixin \Eloquent
 */
class Zamowienie extends Model
{
    use HasFactory;

    protected $table = 'Zamowienia';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'DataUtworzenia';
    const UPDATED_AT = 'DataModyfikacji';

    protected $fillable = [
        'UzytkownikId',
        'CalkowitaKwota',
        'Status',
        'CzyAktywny',
    ];

    protected $casts = [
        'DataUtworzenia' => 'datetime',
        'DataModyfikacji' => 'datetime'
    ];

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'UzytkownikId');
    }

    public function elementyZamowienia()
    {
        return $this->hasMany(ElementZamowienia::class, 'ZamowienieId');
    }
}