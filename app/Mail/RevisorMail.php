<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RevisorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $name;
    public $email;
    public $user_message;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user,$name,  $user_message)
    {
        $this->user = $user;
        $this->name = $name;
        // la mail non deve essere modificata dall'utente altrimenti non corrisponde nel database e da errore
        // $this->email = $email;
        $this->user_message = $user_message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@revisor-presto.it', 'Richiesta revisore'),
            subject: 'Grazie per aver inoltrato una richiesta per diventare revisore',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.revisorMail',
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
