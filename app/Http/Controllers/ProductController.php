<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProduct(){
        $products=Product::OrderBy('id','desc')->paginate('5');
        return view('product/viewProduct')->with(['products'=>$products]);
    }

    public function productCover($id){
        $products=Product::find($id);
        $cover=Storage::disk('newProduct')->get($products->cover);
        return new Response($cover,200);
    }

    public function getNewProduct(){
        $productID=rand(1, 100000);
        return view('product/new')->with(['productID'=>$productID]);
    }

    public function postNewProduct(Request $request){
        $this->validate($request,[
           'productID'=>'required|unique:products',
            'cover'=>'required',
            'name'=>'required',
            'price'=>'required',
            'qty'=>'required'
        ]);

        $cover=$request->file('cover');
        $cover_ex=$request->file('cover')->getClientOriginalExtension();
        $coverName=$request['name'].".".$cover_ex;

        $product=new Product();
        $product->productID=$request['productID'];
        $product->cover=$coverName;
        $product->name=$request['name'];
        $product->price=$request['price'];
        $product->qty=$request['qty'];

        $product->save();

        Storage::disk('newProduct')->put($coverName,file($cover));

        return redirect()->back()->with(['msg'=>'New product was successfully added!']);
    }

    public function deleteProduct(Request $request){

        foreach($request['removeProduct'] as $p){
            $product=Product::find($p);
            $product->delete();
            Storage::disk('newProduct')->delete($product->cover);
        }
        return redirect()->route('viewProduct')->with(['deleteProduct'=>'Remove successful!']);
    }
}
