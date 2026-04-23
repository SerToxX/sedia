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

        $archivosPaths = [];

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $path = $archivo->store('contactos');
                $archivosPaths[] = $path;
            }
        }

        Mail::to('cocotabo7715@gmail.com')
            ->send(new ContactoMail($data, $archivosPaths));
    }
}