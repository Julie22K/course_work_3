<?php

namespace App\Http\Controllers;

use App\Models\SoldBook;
use Illuminate\Http\Request;

class SoldBookController extends Controller
{
    public function index()
    {
        $sold_books = SoldBook::all();
        return view('sold_book.index', compact('sold_books'));
    }
    public function show($id)
    {
        $sold_book = SoldBook::find($id);

        return view('sold_book.show', compact('sold_book'));
    }
    public function create()
    {
        return view('sold_book.add');
    }
    public function store(Request $request)
    {
        $name=$request->input('name');
        $phone=$request->input('phone');
        $address=$request->input('address');
        $email=$request->input('email');
        $category_id=$request->input('category_id');
        $author_id=$request->input('author_id');
        $edition_id=$request->input('edition_id');
        DB::table('sold_books')->insert([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email,
            'category_id'=>$category_id,
            'author_id'=>$author_id,
            'edition_id'=>$edition_id
        ]);
        return redirect()->route('sold_books.index');
    }
    public function destroy($id)
    {
        DB::table('sold_books')->where('id', $id)->delete();
        return redirect()->route('sold_books.index');
    }
    public function edit($id)
    {
        $sold_book= DB::table('sold_books')->where('id', $id)->first();
        $categories=Category::all();
        $editions=Edition::all();
        $authors=Author::all();
        return view('sold_book.update',compact('sold_book','categories','editions','authors'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('name');
        $phone=$request->input('phone');
        $address=$request->input('address');
        $email=$request->input('email');
        $category_id=$request->input('category_id');
        $author_id=$request->input('author_id');
        $edition_id=$request->input('edition_id');
        DB::table('sold_books')->where('id',$id)->update([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email,
            'category_id'=>$category_id,
            'author_id'=>$author_id,
            'edition_id'=>$edition_id
        ]);
        return redirect()->route('sold_books.index');
    }
}
