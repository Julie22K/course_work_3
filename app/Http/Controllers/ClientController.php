<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }
    /*public function show($id)
    {
        $client = Client::find($id);
        return view('client.show', compact('client'));
    }*/
    public function create()
    {
        return view('client.add');
    }
    public function store(Request $request)
    {
        $full_name=$request->input('full_name');
        $phone=$request->input('phone');

        DB::table('clients')->insert([
            'full_name'=>$full_name,
            'phone'=>$phone
        ]);
        return redirect()->route('clients.index');
    }
    public function destroy($id)
    {
        DB::table('edit')->where('id', $id)->delete();
        return redirect()->route('clients.index');
    }
    public function edit($id)
    {
        $client= DB::table('clients')->where('id', $id)->first();
        return view('client.edit', compact('client'));
    }
    public function update(Request $request,$id)
    {
        $full_name=$request->input('full_name');
        $phone=$request->input('phone');
        DB::table('clients')->where('id',$id)->update([
            'full_name'=>$full_name,
            'phone'=>$phone
        ]);
        return redirect()->route('clients.index');
    }
}
