<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class ContactoService
{
    public function enviarCorreo($request)
    {
        $data = $request->only([
            'nombre',
            'empresa',
            'telefono',
            'documento',
            'email',
            'mensaje'
        ]);

        $archivoPath = null;

        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('contactos');
        }

        Mail::to('tucorreo@gmail.com')
            ->send(new ContactoMail($data, $archivoPath));
    }
}