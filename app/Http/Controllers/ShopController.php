<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        /*$units = Unit::all();
        //dd($units);
        return view('unit.index', compact('units'));*/
        return view('shop.index');
    }
    public function show()
    {
        //return view('book.add');
    }
    public function create()
    {
        return view('book.add');
    }
    public function store(Request $request)
    {
        /*$name=$request->input('name');
        DB::table('units')->insert(['im'=>$name]);
        return redirect()->route('units.index');*/
    }
    public function destroy($id)
    {
        /*DB::table('units')->where('id', $id)->delete();
        return redirect()->route('units.index');*/
    }
    public function edit($id)
    {
        /*$unit= DB::table('units')->where('id', $id)->first();
        return view('unit.update', compact('unit'));*/
    }
    public function update(Request $request,$id)
    {
        /*$name=$request->input('name');
        DB::table('units')->where('id',$id)->update(['im'=>$name]);
        return redirect()->route('units.index');*/
    }
}
