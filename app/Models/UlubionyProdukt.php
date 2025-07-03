<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Id
 * @property int $UzytkownikId
 * @property int $ProduktId
 * @property string $DataUtworzenia
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt whereDataUtworzenia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt whereProduktId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UlubionyProdukt whereUzytkownikId($value)
 * @mixin \Eloquent
 */
class UlubionyProdukt extends Model
{
    use HasFactory;

    protected $table = 'UlubioneProdukty';
    protected $primaryKey = 'Id';
    public $timestamps = false;
}