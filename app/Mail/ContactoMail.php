<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;

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

        if (!empty($this->archivos)) {
            foreach ($this->archivos as $archivo) {
                $attachments[] = Attachment::fromPath(storage_path('app/' . $archivo));
            }
        }

        return $attachments;
    }
}
