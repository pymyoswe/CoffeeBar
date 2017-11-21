<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    //
    public function index(){
        $product=Product::OrderBy('id','desc')->paginate('5');
        $cart=Session::has('cart') ? Session::get('cart') : null ;
        if(Session::has('cart')){
            return view('welcome')->with(['products'=>$product])->with(['items'=>$cart->items])->with(['totalAmount'=>$cart->totalPrice])->with(['totalQty'=>$cart->totalQty]);
        }
        return view('welcome')->with(['products'=>$product]);
    }
    public function productImage($id){
        $products=Product::find($id);
        $cover=Storage::disk('newProduct')->get($products->cover);
        return response($cover,200)->header('Content-type','*/*');
    }

    public function getAddToCart($id){
        $pd=Product::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart') : null ;
        $cart=new Cart($oldCart);
        $cart->add($pd,$pd->id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function removeCart(){
        Session::forget('cart');
        return redirect()->route('/');
    }

    public function decItemCart($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->decrease($id);
        if(count($cart->items) <=0){
            Session::forget('cart');
        }else{
            Session::put('cart',$cart);
        }

        return redirect()->back();
    }

    public function incItemCart($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->increase($id);

            Session::put('cart',$cart);

        return redirect()->back();
    }

    public function removeItemCart($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->remove($id);

        if(count($cart->items) <=0){
            Session::forget('cart');
        }else{
            Session::put('cart',$cart);
        }
        return redirect()->back();
    }

    public function printCart(){
        return view('print');
    }

    public function orderCart(Request $request){
        if(Auth::User()){
            $order=new Order();
            $order->tableNum=$request['tableNum'];
            $cart=Session::has('cart')? Session::get('cart') : null;
            $order->cart=serialize($cart);
            $order->user_id=Auth::User()->id;
            $order->save();
            return redirect()->back()->with(['msg'=>'Check Out Success']);
        }else{
            return redirect()->back()->with(['msg'=>'Please login to check out']);
        }



    }


}
