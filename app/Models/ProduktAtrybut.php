<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProduktAtrybut extends Model
{
    use HasFactory;
    protected $table = 'ProduktAtrybut';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = ['ProduktId', 'AtrybutId', 'Wartosc'];
}