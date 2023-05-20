<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    public function index()
    {
        $employee = Employer::all();
        return view('employer.index', compact('employee'));
    }
    public function show($id)
    {
        $employer = Employer::find($id);

        return view('employer.show', compact('employer'));
    }
    public function create()
    {
        $shops=Shop::all();
        return view('employer.add',compact('shops'));
    }
    public function store(Request $request)
    {
        $full_name=$request->input('full_name');
        $phone=$request->input('phone');
        $shop_id=$request->input('shop');
        DB::table('employee')->insert([
            'full_name'=>$full_name,
            'phone'=>$phone,
            'shop_id'=>$shop_id
        ]);
        return redirect()->route('employee.index');
    }
    public function destroy($id)
    {

        //todo delete all sales
        DB::table('employee')->where('id', $id)->delete();
        return redirect()->route('employee.index');
    }
    public function edit($id)
    {
        $employer= DB::table('employee')->where('id', $id)->first();
        return view('employer.edit',compact('employer'));
    }
    public function update(Request $request,$id)
    {
        $full_name=$request->input('full_name');
        $phone=$request->input('phone');
        DB::table('employee')->where('id',$id)->update([
            'full_name'=>$full_name,
            'phone'=>$phone
        ]);
        return redirect()->route('employee.index');
    }
}
