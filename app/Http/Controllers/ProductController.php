<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query();
        $query->where('stock', '>', '0');

        if( $request->has('brand') && !empty($request->brand) )
        {
            $query->where('brand', 'like' , '%'. $request->brand .'%');
        } 

        if( $request->has('size') && !empty($request->size) ){
            $query->where('size','=',$request->size);
        }

        $products = $query->get();

        return view('products.list_product', compact('products'));

        // return view('products.list_product',[
        //     'products' => Product::all()->where('stock','>','0')]);


        
    }
    
    public function store(Request $request){
        /*
        $product = new Product();
        $product->brand = $request->brand;
        $product->modell = $request->model;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->stock = $request->stock;

        if($product->save()){
            return redirect()->route('products.index')->with('success','Sikeres rögzítés');
        }else{
            return redirect()->back()->with('error','Hiba llépett fel.');
        }*/
        $request->validate([
            'brand' => 'required|string|max:255',
            'modell'=> 'required|string|max:255',
            'color' => 'required|string|max:255',
            'size' => 'required|integer|min:27|max:52',
            'stock' => 'required|integer|min:0|max:1000',
            'price' => 'required|integer|min:1000|max:100000',
        ]);

        Product::create([
            'brand' => $request->brand,
            'modell' =>$request->modell,
            'color' => $request->color,
            'size'=> $request->size,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index')->with('success','Sikeres adatrögzítés');
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if($request->quantity > $product->stock){
            return redirect()->route('products.index')->with('error','Nincs elég termék készleten');
        }

        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success','Sikeres vásárlás');
    }

    public function adminIndex(){
        $products = Product::all();
        return view('products.admin_products', compact('products'));
    }

    public function destroy($id){
        $product = Product::find($id);

        if($product){
            $product->delete();
            return redirect()->route('admin_termekek')->with('success','Termék sikereesen törölve');
        }

        return redirect()->route('admin_termekek')->with('error','Hiba a törlés során');
    }
}
