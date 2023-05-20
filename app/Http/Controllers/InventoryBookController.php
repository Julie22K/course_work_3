<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\InventoryBook;
use App\Models\Shop;
use App\Models\SoldBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryBookController extends Controller
{
    public function index()
    {
        $inventory_books = InventoryBook::all();
        //dd($inventory_books);
        return view('inventory_book.index', compact('inventory_books'));
    }
    public function show($id)
    {
        $inventory_book = InventoryBook::find($id);
        return view('inventory_book.show', compact('inventory_book'));
    }
    public function create()
    {
        $books=Book::all();
        $shops=Shop::all();
        return view('inventory_book.add',compact('books','shops'));
    }
    //todo check all relationship in database
    public function store(Request $request)
    {
        $book=$request->input('book');
        $shop=$request->input('shop');
        $price=$request->input('order_price');
        $date=$request->input('order_date');
        DB::table('inventory_books')->insert([
            'book_id'=>$book,
            'shop_id'=>$shop,
            'order_price'=>$price,
            'order_date'=>$date
        ]);
        return redirect()->route('inventory_books.index');
    }
    public function destroy($id)
    {
        DB::table('inventory_books')->where('id', $id)->delete();
        return redirect()->route('inventory_books.index');
    }
    public function edit($id)
    {
        $inventory_book= DB::table('sold_books')->where('id', $id)->first();
        $books=Book::all();
        $shops=Shop::all();
        return view('inventory_book.update',compact('inventory_book','shops','books'));
    }
    public function update(Request $request,$id)
    {
        $book=$request->input('book');
        $shop=$request->input('shop');
        $price=$request->input('order_price');
        $date=$request->input('order_date');
        DB::table('inventory_books')->where('id',$id)->update([
            'book_id'=>$book,
            'shop_id'=>$shop,
            'order_price'=>$price,
            'order_date'=>$date
        ]);
        return redirect()->route('inventory_books.index');
    }
}
