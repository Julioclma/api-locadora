<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailLivroDevolvido extends Mailable
{
    use Queueable, SerializesModels;

    public string $livro;
    public string $usuarioName;

    /**
     * Create a new message instance.
     */
    public function __construct(string $livro, string $usuarioName)
    {
        $this->livro = $livro;
        $this->usuarioName = $usuarioName;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Livro Devolvido com Sucesso',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            htmlString: "<h2>Olá, ".$this->usuarioName."</h2><br>
<h3>Agradecemos pela devolução do livro  '".$this->livro."'</h3>
<h3>Ficamos felizes por optar em alugal conosco, viva a leitura :)</h3>"
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
