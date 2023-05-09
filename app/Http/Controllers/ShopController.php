<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', compact('shops'));
    }
    public function show($id)
    {
        $shop = Shop::find($id);
        return view('shop.show', compact('shop'));
    }
    public function create()
    {
        return view('book.add');
    }
    public function store(Request $request)
    {
        $name=$request->input('name');
        $phone=$request->input('phone');
        $address=$request->input('address');
        $email=$request->input('email');
        DB::table('books')->insert([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email
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
        return view('book.update', compact('book'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('name');
        $phone=$request->input('phone');
        $address=$request->input('address');
        $email=$request->input('email');
        DB::table('books')->where('id',$id)->update([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email
        ]);
        return redirect()->route('books.index');
    }
}
