<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Str;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\Invoice;
use Xendit\Invoice\InvoiceApi;
use App\Models\Consultation;
use App\Events\MessageNotification;
use App\Events\WebhookNotification;

class OrderController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey('xnd_development_eEl2NVAg2hPGUfGPfOVvsUeTrQjmAiWHoojWiWQKanGaB5Eqs60WutSg3mu6tD7');
    }

    public function index()
    {
        // $orders = Order::orderBy('id','desc')->paginate(10);
        $user = auth()->user();
        $orders = Order::with(['order_products', 'order_products.products', 'users'])->orderBy('id', 'desc')->where('user_id', $user->id)->get();

        $orders->toArray();
        return view('admin.user-orders', ['orders'=> $orders]);
    }

    public function orderData()
    {
        $orders = Order::with(['order_products', 'order_products.products', 'users'])->orderBy('id', 'desc')->get();

        $orders->toArray();

        return response()->json([
            'data' => $orders
        ]);
    }

    public function orders()
    {
        $orders = Order::with(['order_products', 'order_products.products', 'users'])->orderBy('id', 'desc')->get();

        $orders->toArray();

        return view('admin.admin-orders', ['orders'=> $orders]);
    }

    public function createPayment(Request $request)
    {

        // get users data
        $user = auth()->user();
        $email = $user->email;

        // get all user carts
        $carts = $user->carts()->get();

        // carts has relation belongs to products
        // after get carts we can get products data
        // we can substract product stock with cart quantity
        // if product stock is less than cart quantity, we can't continue the payment process
        // after that delete all user carts

        $params = [
            'external_id' => (string) Str::uuid(),
            'email' => $email,
            'description' => 'Pembayaran Konsultasi',
            'amount' => $request->total,
            'redirect_url' => 'localhost:8000/consult'
        ];
        
        $apiInstance = new InvoiceApi();

        $createInvoice = new CreateInvoiceRequest($params);

        $result = $apiInstance->createInvoice($createInvoice);

        $order = new Order();
        $order->user_id = $user->id;
        $order->email = $email;
        $order->external_id = $params['external_id'];
        $order->shipping_status = 'processing';
        $order->paid_status = 'settled';
        $order->payment_url = $result['invoice_url'];

        $order->save();


   
        foreach ($carts as $cart) {
            $product = $cart->products()->first();
            if ($product->stock < $cart->quantity) {
                return response()->json([
                    'data' => 'stock is not enough'
                ]);
            }

            $order_product = new OrderProduct();
            $order_product->product_id = $product->id;
            $order_product->order_id = $order->id;
            $order_product->quantity = $cart->quantity;
            $order_product->save();

            $product->stock = $product->stock - $cart->quantity;
            $product->save();
            $cart->delete();
        }

        return response()->json(['status'=> 'success']);

    }


    public function paymentStatus($id)
    {

    }

    public function updateShippingStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->shipping_status = $request->shipping_status;
        $order->save();

        return response()->json([
            'data' => $order
        ]);
    }
}
