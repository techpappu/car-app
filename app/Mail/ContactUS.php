<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUS extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // return $this->subject(trans("mail.contact-us.subject"))->view('mail.contact_us')->with('data', $this->data);
        return $this->subject('Your Contact with ['.$this->data['company_name'].'-'.$this->data['current_date'].']')->view('mail.contact_us')->with('data', $this->data);
    }
}
