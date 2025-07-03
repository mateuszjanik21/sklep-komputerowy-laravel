<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Id
 * @property string $Nazwa
 * @property string|null $Opis
 * @property \Illuminate\Support\Carbon $DataUtworzenia
 * @property \Illuminate\Support\Carbon $DataModyfikacji
 * @property int $CzyAktywny
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produkt> $produkty
 * @property-read int|null $produkty_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria whereCzyAktywny($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria whereDataModyfikacji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria whereDataUtworzenia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria whereNazwa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategoria whereOpis($value)
 * @mixin \Eloquent
 */
class Kategoria extends Model
{
    use HasFactory;

    protected $table = 'Kategorie';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'DataUtworzenia';
    const UPDATED_AT = 'DataModyfikacji';

    protected $fillable = [
        'Nazwa',
        'Opis',
        'Ikona',
    ];

    public function produkty()
    {
        return $this->hasMany(Produkt::class, 'KategoriaId');
    }

    public function atrybuty()
    {
        return $this->belongsToMany(Atrybut::class, 'AtrybutKategoria', 'KategoriaId', 'AtrybutId');
    }
}
