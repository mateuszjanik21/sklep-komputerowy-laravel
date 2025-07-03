<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Produkt;

/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Produkt[] $ulubioneProdukty
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Zamowienie[] $zamowienia
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OpiniaProduktu[] $opinie
 * @property int $Id
 * @property string $Nazwa
 * @property string $Email
 * @property string $Haslo
 * @property int $CzyAdmin
 * @property \Illuminate\Support\Carbon $DataUtworzenia
 * @property \Illuminate\Support\Carbon $DataModyfikacji
 * @property int $CzyAktywny
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read int|null $opinie_count
 * @property-read mixed $password
 * @property-read int|null $ulubione_produkty_count
 * @property-read int|null $zamowienia_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereCzyAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereCzyAktywny($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereDataModyfikacji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereDataUtworzenia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereHaslo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Uzytkownik whereNazwa($value)
 * @mixin \Eloquent
 */

class Uzytkownik extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Uzytkownicy';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'DataUtworzenia';
    const UPDATED_AT = 'DataModyfikacji';

    protected $fillable = [
        'Nazwa',
        'Email',
        'Haslo',
    ];

    protected $hidden = [
        'Haslo',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->Haslo,
        );
    }

    public function zamowienia()
    {
        return $this->hasMany(Zamowienie::class, 'UzytkownikId');
    }

    public function opinie()
    {
        return $this->hasMany(OpiniaProduktu::class, 'UzytkownikId');
    }

    public function ulubioneProdukty()
    {
        return $this->belongsToMany(Produkt::class, 'UlubioneProdukty', 'UzytkownikId', 'ProduktId')
                    ->using(UlubionyProduktPivot::class)
                    ->withPivot('DataUtworzenia');
    }
}