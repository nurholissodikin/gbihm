<?php

namespace App\Mail;

use Crypt;
use App\Personal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PengerjaEmail extends Mailable
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
        $this->pengerja = $personal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $id = $this->pengerja->idpersonal;
        $nama = $this->pengerja->namalengkap;
        $email = $this->pengerja->email;
    
        $encryptedEmail = Crypt::encrypt($this->pengerja->idpersonal);
        // ex: domain.com/verify?token=xxxx
        $link = route('verifikasi.pengerja', ['token' => $encryptedEmail]);
        return $this->subject('Verifikasi Email Anda')
            ->with('link', $link)
            ->view('mails.demo',compact('id','nama','email'));   
    }
    
}
