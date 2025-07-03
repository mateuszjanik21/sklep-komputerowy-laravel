<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Id
 * @property int $ZamowienieId
 * @property int $ProduktId
 * @property int $Ilosc
 * @property string $Cena
 * @property-read \App\Models\Produkt $produkt
 * @property-read \App\Models\Zamowienie $zamowienie
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia whereCena($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia whereIlosc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia whereProduktId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ElementZamowienia whereZamowienieId($value)
 * @mixin \Eloquent
 */
class ElementZamowienia extends Model
{
    use HasFactory;

    protected $table = 'ElementyZamowienia';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'ZamowienieId',
        'ProduktId',
        'Ilosc',
        'Cena',
    ];
    
    public function zamowienie()
    {
        return $this->belongsTo(Zamowienie::class, 'ZamowienieId');
    }

    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'ProduktId');
    }
}