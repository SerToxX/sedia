<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactoService;

class ContactoController extends Controller
{
    protected $contactoService;

    public function __construct(ContactoService $contactoService)
    {
        $this->contactoService = $contactoService;
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
            'archivos' => 'nullable|array|max:5',
            'archivos.*' => 'file|max:5120|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,zip,rar'
        ]);

        $this->contactoService->enviarCorreo($request);

        // Si es AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente'
            ]);
        }

        return back()->with('success', 'Mensaje enviado correctamente');
    }
}