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
                'archivos.*' => 'nullable|file|max:5120|mimetypes:image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,application/x-rar-compressed'
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