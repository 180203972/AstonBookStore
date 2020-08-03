<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Book;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignUp(){
        return view('user.signup');
    }

    public function postSignUp(Request $request){


        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:5'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);

        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        return redirect()->route('user.profile');
    }

    public function getLogIn(){
        return view('user.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->basket = unserialize($order->basket);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('book.index');
    }

    public function getAdminLogin(){
        return view('admin.login');
    }

    public function postAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('admin.profile');
        }
        return redirect()->back();
    }

    public function getAdminProfile()
    {
        $users = User::all();
        $books = Book::orderBy('id', 'ASC')->get();
        return view('admin.profile', ['users' => $users], compact('books'))->with('i', (request()->input('page', 1)-1)*15);
    }

}
