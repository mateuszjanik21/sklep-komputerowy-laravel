<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Atrybut extends Model
{
    use HasFactory;
    protected $table = 'Atrybuty';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'DataUtworzenia';
    const UPDATED_AT = 'DataModyfikacji';
    protected $fillable = ['Nazwa'];

    public function kategorie()
    {
        return $this->belongsToMany(Kategoria::class, 'AtrybutKategoria', 'AtrybutId', 'KategoriaId');
    }
}