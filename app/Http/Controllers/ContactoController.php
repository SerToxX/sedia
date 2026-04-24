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
        try {
            $request->validate([
                'nombre' => 'required',
                'email' => 'required|email',
                'mensaje' => 'required',
                'archivos' => 'nullable|array|max:5',
                'archivos.*' => 'nullable|file|max:25600|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,zip,rar'
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación: ' . implode(', ', $e->errors()['archivos.*'] ?? ['Archivo inválido']),
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }
    }
}