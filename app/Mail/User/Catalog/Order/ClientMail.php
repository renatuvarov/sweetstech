<?php

namespace App\Mail\User\Catalog\Order;

use App\Entities\Catalog\Machine;
use App\Entities\Catalog\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $isEn = $this->order->lang === 'en';

        $mail = $this->markdown(($isEn ? '' : 'ru.') . 'emails.user.catalog.order.client')->with([
            'text' => $isEn ? $this->order->machine->mail_en : $this->order->machine->mail_ru,
            'name' => $this->order->customer_name,
        ])->subject('Sweets Technologies');

        if ($isEn && ! empty($this->order->machine->pdf_en)) {
            $mail->attachFromStorageDisk('local', $this->order->machine->pdf_en);
        } elseif(! $isEn && ! empty($this->order->machine->pdf_ru)) {
            $mail->attachFromStorageDisk('local', $this->order->machine->pdf_ru);
        }

        return $mail;
    }
}
