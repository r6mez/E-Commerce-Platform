<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ProductsExportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath;

    public $qrPath;

    public $reciver;

    public function __construct($filePath, $qrPath, $reciver)
    {
        $this->filePath = $filePath;
        $this->qrPath = $qrPath;
        $this->reciver = $reciver;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Products CSV Export',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.products-export',
            with: [
                'reciverName' => $this->reciver->name,
                'senderName' => Auth::user()->name,
                'qrPath' => $this->qrPath,
            ]
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path("app/{$this->filePath}"))
                ->as('products.csv')
                ->withMime('text/csv'),
        ];
    }
}
