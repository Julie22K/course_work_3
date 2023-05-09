<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditionController extends Controller
{
    public function index()
    {
        $editions = Edition::all();
        return view('edition.index', compact('editions'));
    }
    public function show($id)
    {
        $edition = Edition::find($id);
        return view('edition.show', compact('edition'));
    }
    public function create()
    {
        return view('edition.add');
    }
    public function store(Request $request)
    {
        $name=$request->input('name');
        $phone=$request->input('phone');
        $address=$request->input('address');
        $email=$request->input('email');
        DB::table('editions')->insert([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email
            ]);
        return redirect()->route('editions.index');
    }
    public function destroy($id)
    {
        DB::table('editions')->where('id', $id)->delete();
        return redirect()->route('editions.index');
    }
    public function edit($id)
    {
        $edition= DB::table('editions')->where('id', $id)->first();
        return view('edition.edit', compact('edition'));
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('name');
        $phone=$request->input('phone');
        $address=$request->input('address');
        $email=$request->input('email');
        DB::table('editions')->where('id',$id)->update([
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email
        ]);
        return redirect()->route('editions.index');
    }
}
