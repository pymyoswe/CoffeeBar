<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AuthController extends Controller
{
    //
    public function signUp(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'password_confirm'=>'required|same:password'
        ]);
        $user=new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=bcrypt($request['password']);
        $user->save();

        return redirect()->back()->with(['msg'=>'Sign Up Success.']);
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with(['msg'=>'Sorry login failed!']);
        }

    }
}
