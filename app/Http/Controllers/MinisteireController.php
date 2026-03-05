<?php

namespace App\Http\Controllers;

use App\Models\Ministere;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MinisteireController extends Controller
{
    public function selectIndex(): View
    {
        $ministeres = Ministere::orderBy('name')->get();
        return view('ministeres.select', compact('ministeres'));
    }

    public function downloadTemplate(string $code): BinaryFileResponse
    {
        $ministere = Ministere::where('code', $code)->firstOrFail();
        
        $filePath = public_path("templates/{$code}/maquette.pdf");
        
        if (!file_exists($filePath)) {
            abort(404, "La maquette n'existe pas pour ce ministère.");
        }
        
        return response()->download($filePath, "{$ministere->name}-maquette.pdf");
    }
}
