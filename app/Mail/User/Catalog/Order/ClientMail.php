<?php

namespace App\Mail\User\Catalog\Order;

use App\Entities\Catalog\Machine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    private $clientName;
    /**
     * @var string
     */
    private $lang;
    /**
     * @var Machine
     */
    private $machine;

    public function __construct(Machine $machine, $clientName, $lang)
    {
        $this->clientName = $clientName;
        $this->lang = $lang;
        $this->machine = $machine;
    }

    public function build()
    {
        $mail = $this->markdown(($this->isEn() ? '' : 'ru.') . 'emails.user.catalog.order.client')->with([
            'text' => $this->isEn() ? $this->machine->mail_en : $this->machine->mail_ru,
            'name' => $this->clientName,
        ])->subject('Sweets Technologies');

        if ($this->isEn() && ! empty($this->machine->pdf_en)) {
            $mail->attachFromStorageDisk('local', $this->machine->pdf_en);
        } elseif(! $this->isEn() && ! empty($this->machine->pdf_ru)) {
            $mail->attachFromStorageDisk('local', $this->machine->pdf_ru);
        }

        return $mail;
    }

    private function isEn()
    {
        return $this->lang === 'en';
    }
}
