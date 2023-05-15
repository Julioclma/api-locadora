<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailLivroRetirado extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome;
    public string $livro;
    public string $dataLimiteDevolucao;

    /**
     * Create a new message instance.
     */
    public function __construct(string $nome, string $livro, string $dataLimiteDevolucao)
    {
        $this->nome = $nome;
        $this->livro = $livro;
        $this->dataLimiteDevolucao = $dataLimiteDevolucao;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Você retirou um livro em nossa biblioteca',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            htmlString: "<h2>Olá, Tudo bem? " . $this->nome . "</h3><br><br>
<h3>Você retirou o livro  '" . $this->livro . "'</h3>
<h3>Desejamos uma ótima leitura e que se divirta com sua escolha :)</h3>
<h3>Obs: Fique atento com a data de devolução  <span>". $this->dataLimiteDevolucao."</span></h3>"
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
