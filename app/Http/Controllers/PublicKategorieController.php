<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;

class PublicKategorieController extends Controller
{
    public function index()
    {
        $kategorie = Kategoria::withCount('produkty')->orderBy('Nazwa')->get();
        return view('kategorie.index', ['kategorie' => $kategorie]);
    }
}
