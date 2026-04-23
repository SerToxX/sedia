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
            'archivo' => 'nullable|file|max:2048'
        ]);

        $this->contactoService->enviarCorreo($request);

        return back()->with('success', 'Mensaje enviado correctamente');
    }
}