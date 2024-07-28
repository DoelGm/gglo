<?php

namespace App\Http\Controllers;
use App\Models\Table_product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price']);
        }, 0);
        return view('carrito', compact('cart', 'total'));
    }

    public function addToCart($id)
    {
        $product = Table_product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // si el producto ya esta agragado
            $cart[$id]['count_cart']++;
            if($product->descuento > 0){
                // si el producto ya esta agragado y tiene descuento
                $descuento = ($product->descuento * $product->price)/100;
                $precioDescuento =$product->price -  $descuento;
                $count = $cart[$id]['count_cart'];
                $cart[$id]["price"] = $precioDescuento *$count;
            }else {
                 // si el producto ya esta agragado y no tiene descuento
                $count = $cart[$id]['count_cart'];
                $cart[$id]["price"] = $product->price * $count;

            }
        } else {
            // Si el producto tiene descuento
            if($product->descuento > 0){
                $cart[$id] = [
                    "name" => $product->name,
                    "count_cart" => 1,
                    "price" => $product->price - $product->price * $product->descuento/100,
                    "description" => $product->description
                ];
            }else{
            // si el producto no tiene descuento
                $cart[$id] = [
                    "name" => $product->name,
                    "count_cart" => 1,
                    "price" => $product->price,
                    "description" => $product->description
                ];
            }


        }

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Producto Agregado!');
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->count_cart) {
            $cart = session()->get('cart');
            $product = Table_product::findOrFail($request->id);
            if($product->descuento > 0){
                $descuento = ($product->descuento * $product->price)/100;
                $precioDescuento =$product->price - $descuento ;
                $cart[$request->id]["count_cart"] = $request->count_cart;
                $cart[$request->id]["price"] =  $precioDescuento * $request->count_cart;
            }else{
                $cart[$request->id]["count_cart"] = $request->count_cart;
                $cart[$request->id]["price"] = $product->price * $request->count_cart;
            }

            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'Carrito Actualizado!');

        }
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Producto Eliminado!');
    }
}
