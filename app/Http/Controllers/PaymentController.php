<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use App\Events\WebhookNotification;
use App\Models\Consultation;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Str;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\Invoice;
use Xendit\Invoice\InvoiceApi;

class PaymentController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey('xnd_development_wNjRQQMHWGLaCUUGJyXCsF67firqXrHb11veXm6nDQ9rJmNlmGGidIW7Z4AQ2n');
    }
    public function createPayment($id)
    {
        $user = auth()->user();
        
        $email = $user->email;
        $consultation = Consultation::find($id);

        $params = [
            'external_id' => (string) Str::uuid(),
            'email' => $email,
            'description' => 'Pembayaran Konsultasi',
            'amount' => $consultation->harga,
            'redirect_url' => 'localhost:8000/consult'
        ];

        $apiInstance = new InvoiceApi();

        $createInvoice = new CreateInvoiceRequest($params);

        $result = $apiInstance->createInvoice($createInvoice);

        // check if payment already exist
        $payment = Payment::where('user_id', $user->id)->where('consultation_id', $consultation->id)->first();
        if ($payment) {
            return response()->json([
                'data' => 'already paid'
            ]);
        }
        // save to database
        $payment = new Payment();
        $payment->consultation_id = $consultation->id;
        $payment->external_id = $params['external_id'];
        $payment->user_id = $user->id;
        $payment->status = 'settled';
        $payment->email = $email;
        $payment->payment_url = $result['invoice_url'];
        $payment->expired_date = date('Y-m-d H:i:s', strtotime('+1 day'));
        // $payment->expired_date = date('Y-m-d H:i:s', strtotime('+1 minute'));
        // $payment->expired_date = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $payment->save();


        event(new MessageNotification($payment->consultation_id, strtolower($result['status'])));
        // event(new WebhookNotification($payment->consultation_id, strtolower($result['status'])));



        return response()->json([
            'data' => strtolower($result['status']),
        ]);
    }

    public function webhook(Request $request)
    {
        $apiInstance = new InvoiceApi();
        $result = $apiInstance->getInvoiceById($request->id);

        $payment = Payment::where('external_id', $request->external_id)->first();

        if($payment)
        {
            $payment->status = strtolower($result['status']);
    
            $payment->save();
    
            event(new MessageNotification($payment->consultation_id, strtolower($result['status'])));
            // event(new WebhookNotification($payment->consultation_id, strtolower($result['status'])));
    
            return response()->json([
                'data' => strtolower($result['status'])
            ]);

        } else 
        {
            $order = Order::where('external_id', $request->external_id)->first();
            $order->paid_status = strtolower($result['status']);

            $order->save();

            return response()->json([
                'data'=> strtolower($result['status'])
            ]);
        }
    }


    public function paymentStatus($id)
    {
        $payment = Payment::where('consultation_id', $id)->first();

        if(!$payment) {
            return response()->json([
                'status' => 'not found'
            ]);
        }
        return response()->json([
            'status' => $payment->status,
            'payment_url' => $payment->payment_url,
        ]);
    }
}
