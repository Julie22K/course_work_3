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
        return view('shop.add');
    }
    public function store(Request $request)
    {
        $address=$request->input('address');
        $phone=$request->input('phone');
        DB::table('shops')->insert([
            'address'=>$address,
            'phone'=>$phone
        ]);
        return redirect()->route('shops.index');
    }
    public function destroy($id)
    {
        DB::table('shops')->where('id', $id)->delete();
        return redirect()->route('shops.index');
    }
    public function edit($id)
    {
        $shop= DB::table('shops')->where('id', $id)->first();
        return view('shop.update',compact('shop'));
    }
    public function update(Request $request,$id)
    {
        $address=$request->input('address');
        $phone=$request->input('phone');
        DB::table('shops')->where('id',$id)->update([
            'address'=>$address,
            'phone'=>$phone
        ]);
        return redirect()->route('shops.index');
    }
}
