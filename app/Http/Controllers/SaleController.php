<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index', compact('sales'));
    }
    /*public function show($id)
    {
        $sale = Sale::find($id);
        return view('sale.show', compact('sale'));
    }*/
    public function create()
    {
        return view('sale.add');
    }
    public function store(Request $request)
    {
        $good=$request->input('good_id');
        $client=$request->input('client_id');
        $date=$request->input('date');

        DB::table('sales')->insert([
            'good_id'=>$good,
            'client_id'=>$client,
            'date'=>$date
        ]);
        return redirect()->route('sales.index');
    }
    public function destroy($id)
    {
        DB::table('sales')->where('id', $id)->delete();
        return redirect()->route('sales.index');
    }
    public function edit($id)
    {
        $sale= DB::table('sales')->where('id', $id)->first();
        return view('sale.edit', compact('sale'));
    }
    public function update(Request $request,$id)
    {
        $good=$request->input('good_id');
        $client=$request->input('client_id');
        $date=$request->input('date');
        DB::table('sales')->where('id',$id)->update([
            'good_id'=>$good,
            'client_id'=>$client,
            'date'=>$date
        ]);
        return redirect()->route('sales.index');
    }
}
