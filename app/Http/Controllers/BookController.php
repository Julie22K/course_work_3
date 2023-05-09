<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Edition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//todo views(add)
//todo views(update)
//todo views(show)
//todo users

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }
    public function create()
    {
        $categories=Category::all();
        $editions=Edition::all();
        $authors=Author::all();
        return view('book.add',compact('categories','editions','authors'));
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
        DB::table('books')->insert([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email,
            'category_id'=>$category_id,
            'author_id'=>$author_id,
            'edition_id'=>$edition_id
        ]);
        return redirect()->route('books.index');
    }
    public function destroy($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('books.index');
    }
    public function edit($id)
    {
        $book= DB::table('books')->where('id', $id)->first();
        $categories=Category::all();
        $editions=Edition::all();
        $authors=Author::all();
        return view('book.update',compact('book','categories','editions','authors'));
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
        DB::table('books')->where('id',$id)->update([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email,
            'category_id'=>$category_id,
            'author_id'=>$author_id,
            'edition_id'=>$edition_id
        ]);
        return redirect()->route('books.index');
    }
}
