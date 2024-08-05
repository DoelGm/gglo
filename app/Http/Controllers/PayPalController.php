<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createPayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $cart = session('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'No hay productos en el carrito');
        }

        $items = [];
        foreach ($cart as $details) {
            $items[] = [
                'name' => $details['name'],
                'quantity' => strval($details['count_cart']), // Asegúrate de que sea un entero o cadena numérica
                'unit_amount' => [
                    'currency_code' => 'MXN',
                    'value' => number_format($details['price'], 2, '.', '') // Asegúrate de que tenga dos decimales y punto decimal
                ]
            ];
        }

        $totalAmount = number_format(array_reduce($cart, function($carry, $item) {
            return $carry + $item['price'];
        }, 0), 2, '.', '');

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => $totalAmount, // Asegúrate de que sea una cadena numérica con dos decimales
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "MXN",
                                "value" => $totalAmount, // Asegúrate de que sea una cadena numérica con dos decimales
                            ],
                        ],
                    ],

                ]
                ],
        "application_context" => [
        "return_url" => route('paypal.callback'),  // URL a la que PayPal redirige después del pago
        "cancel_url" => route('paypal.cancel'),    // URL a la que PayPal redirige si el usuario cancela el pago
    ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }

            return redirect()
                ->route('paypal.error')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('paypal.error')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function handlePaymentCallback(Request $request)
    {
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $paypalToken = $provider->getAccessToken();

    $orderId = $request->query('token'); // Asegúrate de que este 'token' sea el correcto

    $response = $provider->capturePaymentOrder($orderId); // Usa el ID de la orden en lugar de token
// Agrega esta línea para ver la respuesta completa de PayPal

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            // Vaciar el carrito de la sesión
            session()->forget('cart');


            return redirect()->route('cart')->with('success', 'Pago completado con éxito. Tu carrito ha sido vacío.');
        } else {
            return redirect()
                ->route('paypal.error')
                ->with('error', $response['message'] ?? 'El pago no se pudo completar.');
        }
    }
    public function handlePaymentCancel()
    {
        return redirect()->route('cart')->with('error', 'El pago fue cancelado.');
    }

}
