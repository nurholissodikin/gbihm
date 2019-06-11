<?php
 
namespace App\Mail;
 
use Crypt;
use App\Ptamukhusus;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

 
class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $tamukhusus;
    private $personal;    

    public function __construct(Ptamukhusus $tamukhusus)
    {
        //
         $this->tamu = $tamukhusus;
    }


    public function build()
    {
       $encryptedEmail = Crypt::encrypt($this->tamu->email);
     
        // ex: domain.com/verify?token=xxxx
        $link = route('verifikasi.email', ['token' => $encryptedEmail]);
        return $this->subject('Verify Your Email Address')
            ->with('link', $link)
            ->view('mails.demo');
            
    }
}
public function ask()

{
    
}