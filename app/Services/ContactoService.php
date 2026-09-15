<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactoMail;

class ContactoService
{
    private string $destinatario;

    public function __construct()
    {
        $this->destinatario = env('MAIL_TO_ADDRESS', 'cocotabo7715@gmail.com');
    }

    public function enviarConDatos(array $data): void
    {
        Log::info('ContactoService: Enviando contactanos', ['email' => $data['email'] ?? '']);
        try {
            Mail::to($this->destinatario)->send(
                new ContactoMail($data, [], 'emails.contactanos', 'Nuevo mensaje de contacto — SEDIA')
            );
            Log::info('ContactoService: Correo contactanos enviado');
        } catch (\Exception $e) {
            Log::error('ContactoService: Error al enviar contactanos', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function enviarDesdeContactanos(array $validated): void
    {
        $data = [
            'nombre'    => trim($validated['nombres'] . ' ' . $validated['apellidos']),
            'email'     => $validated['correo'],
            'mensaje'   => $validated['mensaje'],
            'telefono'  => $validated['celular'] ?? null,
            'empresa'   => $validated['asunto'] ?? null,
            'documento' => null,
        ];

        $this->enviarConDatos($data);
    }

    /**
     * @param array<string, mixed>  $data
     * @param UploadedFile[]        $archivos
     */
    public function enviarCorreo(array $data, array $archivos = []): void
    {
        Log::info('ContactoService: Iniciando envío de correo', [
            'nombre'            => $data['nombre'] ?? '',
            'email'             => $data['email'] ?? '',
            'cantidad_archivos' => count($archivos),
        ]);

        $archivosAlmacenados = $this->almacenarArchivos($archivos);

        try {
            Mail::to($this->destinatario)->send(new ContactoMail($data, $archivosAlmacenados));
            Log::info('ContactoService: Correo enviado exitosamente');
        } catch (\Exception $e) {
            Log::error('ContactoService: Error al enviar correo', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    /** @param UploadedFile[] $archivos */
    private function almacenarArchivos(array $archivos): array
    {
        $almacenados = [];

        foreach ($archivos as $archivo) {
            try {
                $nombreOriginal = $archivo->getClientOriginalName();
                $path           = $archivo->store('contactos');

                Log::info('ContactoService: Archivo almacenado', [
                    'nombre_original' => $nombreOriginal,
                    'path'            => $path,
                ]);

                $almacenados[] = ['path' => $path, 'nombre_original' => $nombreOriginal];
            } catch (\Exception $e) {
                Log::error('ContactoService: Error al guardar archivo', [
                    'error'   => $e->getMessage(),
                    'archivo' => $archivo->getClientOriginalName(),
                ]);
                throw $e;
            }
        }

        return $almacenados;
    }
}