<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    /*public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }*/
    public function create()
    {
        return view('category.add');
    }
    public function store(Request $request)
    {
        $name=$request->input('name');

        DB::table('categories')->insert([
            'name'=>$name
        ]);
        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        DB::table('edit')->where('id', $id)->delete();
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $category= DB::table('categories')->where('id', $id)->first();
        return view('category.edit', compact('category'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('name');
        DB::table('categories')->where('id',$id)->update([
            'name'=>$name
        ]);
        return redirect()->route('categories.index');
    }
}
