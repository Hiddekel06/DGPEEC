<?php

namespace App\Http\Controllers;

use App\Models\Ministere;
use Illuminate\View\View;

class MinisteireController extends Controller
{
    public function selectIndex(): View
    {
        $ministeres = Ministere::orderBy('name')->get();
        return view('ministeres.select', compact('ministeres'));
    }

    public function show(Ministere $ministere): View
    {
        return view('ministeres.show', compact('ministere'));
    }
}
