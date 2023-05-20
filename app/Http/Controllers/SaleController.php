<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Employer;
use App\Models\InventoryBook;
use App\Models\Sale;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //todo check
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index', compact('sales'));
    }
    public function show($id)
    {
        $sale = Sale::find($id);

        return view('sale.show', compact('sale'));
    }
    public function create()
    {
        $consumers=Consumer::all();
        $employee=Employer::all();
        $inventory_books=InventoryBook::all();
        $shops=Shop::all();
        return view('sale.add',compact('employee','consumers','inventory_books','shops'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $employer=$request->input('employer');
        $consumer=$request->input('consumer');

        $shop=Employer::find($employer)->shop_id;
        $date=$request->input('date');

        $books=$request->input('books');
        $sale_id=DB::table('sales')->insertGetId([
            'employer_id'=>$employer,
            'consumer_id'=>$consumer,
            'shop_id'=>$shop,
            'date'=>$date
        ]);
        foreach ($books as $book_id)
        {
            $book=InventoryBook::find($book_id);
            DB::table('sold_books')->insert([
                'sale_id'=>$sale_id,
                'inventory_book_id'=>$book_id,
                'price'=>$book->order_price*1.3

            ]);
        }
        return redirect()->route('sales.index');
    }
    public function destroy($id)
    {
        DB::table('sold_books')->where('sale_id', $id)->delete();
        DB::table('sales')->where('id', $id)->delete();
        return redirect()->route('sales.index');
    }
    public function edit($id)
    {
        $sale= DB::table('sales')->where('id', $id)->first();
        return view('sale.update',compact('sale'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('name');
        DB::table('sales')->where('id',$id)->update([
            'name'=>$name
        ]);
        return redirect()->route('sales.index');
    }
}
