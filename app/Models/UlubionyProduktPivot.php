<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UlubionyProduktPivot extends Pivot
{
    protected $table = 'UlubioneProdukty';

    public $incrementing = true;

    public $timestamps = false;

    protected $casts = [
        'DataUtworzenia' => 'datetime',
    ];
}