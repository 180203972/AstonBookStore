<?php

namespace App;

class Basket{
    public $books = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldBasket)
    {
        if($oldBasket){
            $this->books = $oldBasket->books;
            $this->totalQty = $oldBasket->totalQty;
            $this->totalPrice = $oldBasket->totalPrice;
        }
    }

    public function add($book, $id){
        $storedBook = ['qty' => 0, 'price' => $book->price, 'book' => $book];
        if($this->books){
            if(array_key_exists($id, $this->books)){
                $storedBook = $this->books[$id];
            }
        }
        $storedBook['qty']++;
        $storedBook['price'] = $book->price * $storedBook['qty'];
        $this->books[$id] = $storedBook;
        $this->totalQty++;
        $this->totalPrice += $book->price;
    }

    public function reduceByOne($id){
        $this->books[$id]['qty']--;
        $this->books[$id]['price'] -= $this->books[$id]['book']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->books[$id]['book']['price'];
        if($this->books[$id]['qty']<=0){
            unset($this->books[$id]);
        }
    }

    public function removeAll($id){
        $this->totalQty -= $this->books[$id]['qty'];
        $this->totalPrice -= $this->books[$id]['price'];
        unset($this->books[$id]);
    }
}