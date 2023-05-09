<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    //todo all controllers
    //todo all views(add,update,show)
    //todo user types
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }
    public function show($id)
    {
        $author = Author::find($id);
        return view('author.show', compact('author'));
    }
    public function create()
    {
        return view('author.add');
    }
    public function store(Request $request)
    {
        $name=$request->input('full_name');
        DB::table('authors')->insert([
            'full_name'=>$name
        ]);
        return redirect()->route('authors.index');
    }
    public function destroy($id)
    {
        DB::table('authors')->where('id', $id)->delete();
        return redirect()->route('authors.index');
    }
    public function edit($id)
    {
        $author= DB::table('authors')->where('id', $id)->first();
        return view('author.update', compact('author'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('full_name');
        DB::table('authors')->where('id',$id)->update([
            'full_name'=>$name
        ]);
        return redirect()->route('authors.index');
    }
}
