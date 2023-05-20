<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Employer;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    //todo додавання автора та жанру з книгою, якщо такого жанру чи книги немаэ додати
    public function index()
    {
        $books = Book::all();
        /*foreach ($books as $book)
        {
            dump($book->book_author[0]->author->full_name);
        }*/
        return view('book.index', compact('books'));
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show', compact('book'));
    }
    public function create()
    {
        $genres=Genre::all();
        $authors=Author::all();
        return view('book.add',compact('genres','authors'));
    }
    public function store(Request $request)
    {
        $title=$request->input('title');
        $genre_id=$request->input('genre');
        $author_id=$request->input('author');
        $book_id=DB::table('books')->insertGetId([
            'title'=>$title
        ]);
        DB::table('book_genres')->insert([
            'book_id'=>$book_id,
            'genre_id'=>$genre_id
        ]);
        DB::table('book_authors')->insert([
            'book_id'=>$book_id,
            'author_id'=>$author_id
        ]);
        return redirect()->route('books.index');
    }
    public function destroy($id)
    {
        DB::table('book_authors')->where('book_id', $id)->delete();
        DB::table('book_genres')->where('book_id', $id)->delete();
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('books.index');
    }
    public function edit($id)
    {
        $book= DB::table('books')->where('id', $id)->first();
        $genres=Genre::all();
        $authors=Author::all();
        return view('book.edit',compact('book','genres','authors'));
    }
    public function update(Request $request,$id)
    {
        $title=$request->input('title');
        $genre_id=$request->input('genre');
        $author_id=$request->input('author');
        DB::table('books')->where('id',$id)->update([
            'title'=>$title
        ]);
        DB::table('book_genres')->where('book_id',$id)->update([
            'genre_id'=>$genre_id
        ]);
        DB::table('book_authors')->where('book_id',$id)->update([
            'author_id'=>$author_id
        ]);
        return redirect()->route('books.index');
    }
}
