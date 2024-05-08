<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = [];
        return view('products.index', ['product' => product::latest()->get()]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request) 
    {
        // dd($request->all());
        //validate data
        $request->validate([
            'name' => 'required|min:3|max:20',
            'description' => 'required|min:15|max:100',
            'image' => 'required|mimes:jpg,png,jpeg|max:2000'

        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product'), $imageName);
        // dd($imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product created !!!!');



    }
    public function edit($id){
        //dd($id);
        $product=product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request,$id){
       // dd($id);
       $request->validate([
        'name' => 'required|min:3|max:20',
        'description' => 'required|min:15|max:1000',
        'image' => 'nullable|mimes:jpg,png,jpeg|max:1000'

    ]);
    $product  = product::where('id',$id)->first();



    if(isset($request->image)){
        $imageName = time() . '.' . $request->image->extension();
       $request->image->move(public_path('product'), $imageName);
       $product->image = $imageName;

    }
       $product->name = $request->name;
       $product->description = $request->description;

       $product->save();
       return back()->withSuccess('Product updated !!!!');
}
public function destroy($id){
    $product=product::where('id',$id)->first();
    $product->delete();
    return back()->withSuccess('Product deleted !!!!');

}
public function show($id){
    $product=product::where('id',$id)->first();
    return view( "products.show",["product"=>$product] );
    }

}