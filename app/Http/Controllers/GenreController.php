<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }
    public function show($id)
    {
        $genre = Genre::find($id);
        return view('genre.show', compact('genre'));
    }
    public function create()
    {
        return view('genre.add');
    }
    public function store(Request $request)
    {
        $name=$request->input('name');
        DB::table('genres')->insert([
            'name'=>$name
        ]);
        return redirect()->route('genres.index');
    }
    public function destroy($id)
    {
        //todo delete books?!
        DB::table('book_genres')->where('genre_id', $id)->delete();
        DB::table('genres')->where('id', $id)->delete();
        return redirect()->route('genres.index');
    }
    //todo fill database
    public function edit($id)
    {

        $genre= DB::table('genres')->where('id', $id)->first();
        return view('genre.edit',compact('genre'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('name');
        DB::table('genres')->where('id',$id)->update([
            'name'=>$name,
        ]);
        return redirect()->route('genres.index');
    }
}
