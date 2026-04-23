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
    public $archivo;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $archivo = null)
    {
        $this->data = $data;
        $this->archivo = $archivo;
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
        if ($this->archivo) {
            return [
                Attachment::fromPath(storage_path('app/' . $this->archivo)),
            ];
        }

        return [];
    }
}
