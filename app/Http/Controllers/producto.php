<?php

namespace App\Http\Controllers;
use App\Models\Table_product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    public function modProduct(){
        $products = Table_product::all();
        return view('catalogo-productos', compact('products'));
    }
    public function newProduct(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'type'=> ['required', 'string'],
            'brand'=>['required', 'string'],
            'discount'=>['required', 'numeric'],
            'quantity_in_stock'=>['required', 'integer'],
            'color'=>['required', 'string'],
            'status'=>['required', 'string']
        ]);

        Table_product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'brand' => $request->brand,
            'discount' => $request->discount,
            'quantity_in_stock' => $request->quantity_in_stock,
            'color' => $request->color,
            'status' => $request->status
        ]);

        return redirect()->route('products');
    }
    public function editProduct($id)
    {
        // Buscar el producto por su ID
        $product = Table_product::findOrFail($id);

        // Retornar la vista de edición del producto, pasando el producto como parámetro
        return view('product.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id){

        $product = Table_product::findOrFail($id);
        // dd($user);
        // if (Gate::denies('update', [$user, $request->user()])) {
        //     abort(403); // Puedes personalizar la respuesta de acceso denegado según tus necesidades
        // }
        if (Auth::user()->role === 'admin') {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer'],
                'type' => ['required', 'string', 'max:10'],
                'brand' => ['required', 'string'],
                'discount' => ['required', 'numeric'],
                'quantity_in_stock' => ['required', 'integer'],
                'color' => ['required', 'string'],
                'status' => ['required', 'string']
            ]);
            $product->fill($validatedData);
            $product->save();


            return redirect()->route('products')->with('status', 'Usuario actualizado correctamente.');

        } return redirect()->route('dashboard');
    }
    public function delete($id)
    {
        // Buscar el producto por su ID
        $product = Table_product::findOrFail($id);

        // Retornar la vista de edición del producto, pasando el producto como parámetro
        return view('product.deleteProduct', compact('product'));
    }
    public function destroy($id)
    {
        $product = Table_product::findOrFail($id);
        if(Auth::user()->role === 'admin'){
            $product->delete();
            return redirect()->route('products');
        }

    }

}
