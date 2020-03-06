<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Catalog\OrderRequest;
use App\Mail\User\Catalog\Order\AdminMail;
use App\Mail\User\Catalog\Order\ClientMail;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Mail\Mailer;
use PHPMailer\PHPMailer\PHPMailer;

class OrderController extends Controller
{
    public function order(OrderRequest $request, \Illuminate\Contracts\Mail\Mailer $mailer)
    {
        if (Order::isAlreadyOrdered($request->all())) {
            return ['isAlreadyOrdered' => true];
        }

        $order = Order::createOrder($request->all());
        $machine = $order->machine;
        $lang = $this->getLang();
        $mailText = $lang === 'ru' ? $machine->mail_ru : $machine->mail_en;
        $prefix = $lang === 'ru' ? 'ru.' : '';
        $mailer->to($order->customer_email)->send(new ClientMail($mailText, $order->customer_name, $prefix));
        $mailer->to(env('ADMIN_EMAIL'))->send(new AdminMail($order, $machine));
//        return [$order->customer_email];
//        $clientText = <<<MESS
//Dear <b>{ $order->customer_name }</b>,<br><br>
//Thank You for contacting to our company. { $mailText }
//<br><br>
//Best regards,<br><br>
//Sweets Technologies team<br>
//<img src="https://sweetstech.com/mmc-200/assets/img/logo_mail.png" alt=""> <br><br><br>
//We offer more details about the machines of our production:<br><br>
//Forming machine for cereals bars MMC-400 <br>
//<a href="https://youtu.be/wnyeSNFc4PA">https://youtu.be/wnyeSNFc4PA</a> <br><br>
//Molding machine for plastics masses RFM-200 <br>
//<a href="https://youtu.be/XwlpGS1u4LE">https://youtu.be/XwlpGS1u4LE</a> <br>
//MESS;
//        $from = 'info@sweetstech.com';
//        $clientMailer = new PHPMailer();
//        try {
//            $clientMailer->CharSet = 'UTF-8';
//            $clientMailer->isSMTP();
//            $clientMailer->SMTPAuth = true;
//            $clientMailer->SMTPDebug = 1;
//
//            $clientMailer->Host = 'smtp.mail.ru';
//            $clientMailer->Port = 465;
//            $clientMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//            $clientMailer->Username = $from;
//            $clientMailer->Password = 'KbQUL~d~R3';
//            $clientMailer->setFrom($from, $from);
//            $clientMailer->addAddress($order->customer_email, $order->customer_name);
//            $clientMailer->Subject = 'mmc-200';
//            $clientMailer->msgHTML($clientText);
//            if (! $clientMailer->send()) {
//                echo $clientMailer->ErrorInfo;
//            }
//        } catch (\Exception $exception) {
//            echo $exception->getMessage();
//        }


        return ['success' => $order->customer_name];
    }
}
