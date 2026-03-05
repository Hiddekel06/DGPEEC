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
        
        $templateDir = public_path("templates/{$code}");
        
        // Chercher le premier fichier PDF dans le dossier
        $files = glob($templateDir . "/*.pdf");
        
        if (empty($files)) {
            abort(404, "La maquette n'existe pas pour ce ministère.");
        }
        
        $filePath = $files[0];
        $fileName = basename($filePath);
        
        return response()->download($filePath, "{$ministere->name}-{$fileName}");
    }
}
