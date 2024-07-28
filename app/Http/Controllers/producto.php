<?php

namespace App\Http\Controllers;
use App\Models\Table_product;
use Illuminate\Http\Request;

class producto extends Controller
{
    public function index(){
        $products = Table_product::all();
        return view('dashboard', compact('products'));
    }
    public function product(){
        $products = Table_product::all();
        return view('catalago-Ropa', compact('products'));
    }
    public function productSearch(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Filtra productos según el término de búsqueda
            $products = Table_product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhere('type', 'LIKE', "%{$query}%")
                ->get();
        } else {
            // Si no hay término de búsqueda, obtener todos los productos
            $products = Table_product::all();
        }

        return view('catalago-Ropa', compact('products'));
    }

    public function productPl(){
        // Obtener todos los productos cuyo campo 'type' sea 'playera'
        $products = Table_product::where('type', 'playera')->get();
        if(!$products->isEmpty()){
            return view('catalago-Ropa', compact('products'));
        }else{
            return view('catalago-Ropa');
        }
    }
    public function productP(){
        $products = Table_product::where('type', 'Pantalones')->get();
        if(!$products->isEmpty()){
            return view('catalago-Ropa', compact('products'));
        }else{
            return view('catalago-Ropa');
        }
    }
    public function productG(){
        $products = Table_product::where('type', 'Gorras')->get();
        if(!$products->isEmpty()){
            return view('catalago-Ropa', compact('products'));
        }else{
            return view('catalago-Ropa');
        }
    }
    public function info($id){
        $product = Table_product::findOrFail($id);
        return view('infomacion-Producto', compact('product'));
    }
}
