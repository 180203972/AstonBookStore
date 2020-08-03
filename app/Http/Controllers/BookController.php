<?php

namespace App\Http\Controllers;
use App\Basket;
use App\Book;
use App\Order;
use Illuminate\Http\Request;
use Session;
use Auth;

class BookController extends Controller
{
    public function getIndex(){
        $books = Book::all();
        return view('store.index')->with('books', $books);
    }

    public function getAddToBasket(Request $request, $id){
        $book = Book::find($id);
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->add($book, $book->id);
        $request->session()->put('basket', $basket);
        $request->session()->save();
        return redirect()->route('book.index');
    }

    public function getReduceByOne($id){
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->reduceByOne($id);
        if(count($basket->books)>0){
            Session::put('basket', $basket);
        } else{
            Session::forget('basket');
        }
        return redirect()->route('book.basket');
    }

    public function getRemoveAll($id){
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->removeAll($id);
        if(count($basket->books)>0){
            Session::put('basket', $basket);
        } else{
            Session::forget('basket');
        }
        return redirect()->route('book.basket');
    }

    public function getBasket(){
        if(!Session::has('basket')){
            return view('store.basket');
        }
        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);
        return view('store.basket', ['books' => $basket->books, 'totalPrice' => $basket->totalPrice]);
    }

    public function getCheckout(){
        if(!Session::has('basket')){
            return view('store.basket');
        }
        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);
        $total = $basket->totalPrice;
        return view('store.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('basket')){
            return redirect()->route('store.basket');
        }
        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);
        $order = new Order();
        $order->basket = serialize($basket);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->card_number = $request->input('card_number');
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'card_name' => 'required',
            'card_number' => 'required|integer|min:16',
            'expirationMonth' => 'required|integer|min:2',
            'expirationYear' => 'required|integer|min:4',
            'cvc' => 'required|integer|min:3'
        ]);
        Auth::user()->orders()->save($order);
        Session::forget('basket');
        return redirect()->route('book.index')->with('success', "Successful Purchase");
    }

    public function getCreateBook(){
        return view('admin.create');
    }

    public function postCreateBook(Request $request){
        $request->validate([
            'imagePath' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publishedYear' => 'required|integer',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        Book::create($request->all());
        return redirect()->route('admin.profile')->with('success', 'Book Created Successfully');
    }

    public function getShowBook($id){
        $book = Book::find($id);
        return view('admin.show', compact('book'));
    }

    public function getEditBook($id){
        $book = Book::find($id);
        return view('admin.edit', compact('book'));
    }

    public function patchEditBook(Request $request, $id){
        $request->validate([
            'imagePath' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publishedYear' => 'required|integer',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $book = Book::find($id);
        $book->imagePath =  $request->get('imagePath');
        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->publishedYear = $request->get('publishedYear');
        $book->category = $request->get('category');
        $book->description = $request->get('description');
        $book->price = $request->get('price');
        $book->save();
        return redirect()->route('admin.profile')->with('success', 'Book Edited Successfully');
    }

    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('admin.profile')->with('success', 'Book Deleted Successfully');
    }
}