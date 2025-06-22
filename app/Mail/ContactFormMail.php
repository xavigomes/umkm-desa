<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData; // Properti publik untuk menyimpan data dari form

    /**
     * Create a new message instance.
     */
    public function __construct($formData)
    {
        $this->formData = $formData; // Menerima data form dari controller
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pesan Baru dari Formulir Kontak UMKM Desa', // Subjek email
            replyTo: $this->formData['email'], // Balas ke email pengirim form
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form', // Menggunakan view 'emails/contact-form.blade.php'
            with: [
                'name' => $this->formData['name'],
                'email' => $this->formData['email'],
                'subject' => $this->formData['subject'],
                'userMessage' => $this->formData['message'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}