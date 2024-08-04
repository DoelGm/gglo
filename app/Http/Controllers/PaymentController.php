<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
class PaymentController extends Controller
{
    public function __construct()
    {
        SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
    }

    public function createPayment(Request $request)
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'No hay productos en el carrito');
        }

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Crea los ítems de la preferencia
        $items = [];
        foreach ($cart as $details) {
            $item = new Item();
            $item->title = $details['name'];
            $item->quantity = $details['count_cart'];
            $item->unit_price = $details['price'];
            $items[] = $item;
        }
        $preference->items = $items;

        $preference->save();

        return redirect($preference->init_point);
    }
}
