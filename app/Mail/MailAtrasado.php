<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailAtrasado extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome;
    public string $livro;
    /**
     * Create a new message instance.
     */
    public function __construct(string $nome, string $livro)
    {
        $this->nome = $nome;
        $this->livro = $livro;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Você tem livro Atrasado na Biblioteca',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            htmlString: "Olá, ".$this->nome.". A devolução do livro ".$this->livro." encontra-se pendente!"
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
