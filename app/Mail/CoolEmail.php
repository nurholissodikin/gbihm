<?php

namespace App\Mail;

use Crypt;
use App\Personal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CoolEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $personal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Personal $personal)
    {
        //
        $this->personal = $personal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $encryptedEmail = Crypt::encrypt($this->personal->email);
        // ex: domain.com/verify?token=xxxx
        $link = route('verifikasi.cool', ['token' => $encryptedEmail]);
        return $this->subject('Verify Your Email Address')
            ->with('link', $link)
            ->view('mails.demo');
    }
}
