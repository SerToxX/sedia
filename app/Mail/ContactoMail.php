<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Log;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $archivos;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $archivos = [])
    {
        $this->data = $data;
        $this->archivos = $archivos;
    }

    /**
     * Subject del correo
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo proyecto SEDIA',
        );
    }

    /**
     * Vista del correo
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contacto',
        );
    }

    /**
     * Adjuntos
     */
    public function attachments(): array
    {
        $attachments = [];

        Log::info('ContactoMail: Procesando adjuntos', [
            'cantidad' => count($this->archivos),
            'archivos' => $this->archivos
        ]);

        if (!empty($this->archivos)) {
            foreach ($this->archivos as $archivo) {
                try {
                    $fullPath = storage_path('app/' . $archivo);
                    
                    Log::info('ContactoMail: Verificando archivo', [
                        'path' => $archivo,
                        'fullPath' => $fullPath,
                        'existe' => file_exists($fullPath),
                        'es_readable' => is_readable($fullPath)
                    ]);
                    
                    if (!file_exists($fullPath)) {
                        Log::warning('ContactoMail: Archivo no existe', [
                            'fullPath' => $fullPath
                        ]);
                        continue;
                    }
                    
                    $attachments[] = Attachment::fromPath($fullPath);
                    Log::info('ContactoMail: Archivo adjuntado exitosamente', [
                        'archivo' => $archivo
                    ]);
                } catch (\Exception $e) {
                    Log::error('ContactoMail: Error al adjuntar archivo', [
                        'error' => $e->getMessage(),
                        'archivo' => $archivo,
                        'trace' => $e->getTraceAsString()
                    ]);
                }
            }
        }

        Log::info('ContactoMail: Adjuntos finales', [
            'cantidad' => count($attachments)
        ]);

        return $attachments;
    }
}
