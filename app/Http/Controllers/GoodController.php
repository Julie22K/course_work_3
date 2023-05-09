<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    public function index()
    {
        $goods = Good::all();
        return view('good.index', compact('goods'));
    }
    /*public function show($id)
    {
        $good = Good::find($id);
        return view('good.show', compact('good'));
    }*/
    public function create()
    {
        return view('good.add');
    }
    public function store(Request $request)
    {
        $shop_id=$request->input('shop_id');
        $book_id=$request->input('book_id');
        $sale_price=$request->input('sale_price');

        DB::table('goods')->insert([
            'shop_id'=>$shop_id,
            'book_id'=>$book_id,
            'sale_price'=>$sale_price,
        ]);
        return redirect()->route('goods.index');
    }
    public function destroy($id)
    {
        DB::table('edit')->where('id', $id)->delete();
        return redirect()->route('goods.index');
    }
    public function edit($id)
    {
        $good= DB::table('goods')->where('id', $id)->first();
        return view('good.edit', compact('good'));
    }
    public function update(Request $request,$id)
    {
        $shop_id=$request->input('shop_id');
        $book_id=$request->input('book_id');
        $sale_price=$request->input('sale_price');
        DB::table('goods')->where('id',$id)->update([
            'shop_id'=>$shop_id,
            'book_id'=>$book_id,
            'sale_price'=>$sale_price,
        ]);
        return redirect()->route('goods.index');
    }
}
