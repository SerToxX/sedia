<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; // <-- agregar
class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(
        public array $data,
        public array $archivos = [],
        private string $emailView = 'emails.contacto',
        private string $emailSubject = 'Nuevo proyecto SEDIA'
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->emailSubject);
    }

    public function content(): Content
    {
        return new Content(view: $this->emailView);
    }
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
                $path = is_array($archivo) ? ($archivo['path'] ?? null) : $archivo;
                $nombreOriginal = is_array($archivo) ? ($archivo['nombre_original'] ?? basename((string) $path)) : basename((string) $path);
                if (!$path) {
                    continue;
                }
                $fullPath = Storage::disk('local')->path($path);
                Log::info('ContactoMail: Verificando archivo', [
                    'path' => $path,
                    'nombre_original' => $nombreOriginal,
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
                // Aquí forzamos el nombre que verá el destinatario
                $attachments[] = Attachment::fromPath($fullPath)->as($nombreOriginal);
                Log::info('ContactoMail: Archivo adjuntado exitosamente', [
                    'archivo' => $path,
                    'nombre_mostrado' => $nombreOriginal
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