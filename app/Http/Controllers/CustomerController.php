<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if (isset($keyword)){

            $data = Customers::where('hoTen','like','%'.$keyword.'%')->get();
        }else{
            $data = Customers::all();
        }
        return view('customers.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rule = [
          'hoTen' => 'required|min:3',
            'sdt' => 'required|numeric|unique:customers,sdt',
            'email' => 'required|email|unique:customers,email'
        ];
        $validate = Validator::make($request->all(),$rule);
        if ($validate->passes()){
            $hoTen = $request->hoTen;
            $gt = $request->gt;
            $sdt = $request->sdt;
            $email = $request->email;
//            save images
            $avatar = $request->file('avatar');
            $path = 'public/images';
            if(Storage::disk('local')->exists($path)){
                Storage::makeDirectory($path);
            }
            if(!empty($avatar)){
                $filename = $avatar->getClientOriginalName();
                $request->file('avatar')->storeAs($path, $filename, 'local');
            }
            Customers::insert([
                'avatar' => $filename,
                'hoTen' =>$hoTen,
                'gt' => $gt,
                'sdt' => $sdt,
                'email' => $email
            ]);
            return redirect('/customers/create');
        }
        else{
            return view('customers.create',['error'=>$validate->errors()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
