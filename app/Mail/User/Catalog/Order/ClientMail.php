<?php

namespace App\Mail\User\Catalog\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    private $mailText;
    private $clientName;
    /**
     * @var string
     */
    private $lang;

    public function __construct($mailText, $clientName, $lang = '')
    {
        $this->mailText = $mailText;
        $this->clientName = $clientName;
        $this->lang = $lang;
    }

    public function build()
    {
        return $this->markdown($this->lang . 'emails.user.catalog.order.client')->with([
                'text' => $this->mailText,
                'name' => $this->clientName,
            ])->subject('Sweets Technologies');
//            ->attachFromStorageDisk(
//                'local',
//                '/attachments/pdf/Quotation Cereal mass 200.pdf',
//                'Quotation Cereal mass 200.pdf',
//                [
//                    'mime' => 'application/pdf',
//                ]
//            );
    }
}
