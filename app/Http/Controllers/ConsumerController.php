<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    public function index()
    {
        $consumers = Consumer::all();
        return view('consumer.index', compact('consumers'));
    }
    public function show($id)
    {
        $consumer = Consumer::find($id);

        return view('consumer.show', compact('consumer'));
    }
    public function create()
    {
        return view('consumer.add');
    }
    public function store(Request $request)
    {
        $full_name=$request->input('full_name');
        $phone=$request->input('phone');
        DB::table('consumers')->insert([
            'full_name'=>$full_name,
            'phone'=>$phone
        ]);
        return redirect()->route('consumers.index');
    }
    public function destroy($id)
    {

        //todo delete all sales
        DB::table('consumers')->where('id', $id)->delete();
        return redirect()->route('consumer.index');
    }
    public function edit($id)
    {
        $consumers= DB::table('consumers')->where('id', $id)->first();
        return view('consumers.update',compact('consumers'));
    }
    public function update(Request $request,$id)
    {
        $full_name=$request->input('full_name');
        $phone=$request->input('phone');
        DB::table('consumers')->where('id',$id)->update([
            'full_name'=>$full_name,
            'phone'=>$phone
        ]);
        return redirect()->route('consumers.index');
    }
}
