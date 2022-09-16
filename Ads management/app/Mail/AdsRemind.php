<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdsRemind extends Mailable
{
    use Queueable, SerializesModels;

    public $adver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adver)
    {
        $this->adver = $adver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.adRemind');
    }
}
