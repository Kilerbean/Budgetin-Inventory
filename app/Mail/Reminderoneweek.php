<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Reminderoneweek extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $kalibrasinearweek;

    /**
     * Create a new message instance.
     */
    public function __construct($kalibrasinearweek)
    {
        $this->kalibrasinearweek = $kalibrasinearweek;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Q-LIS |Reminder Of Calibration Schedule Approaching 1 week of Calibration Time',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email_reminderoneweek',
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
