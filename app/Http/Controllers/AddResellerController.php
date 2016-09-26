<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;

class AddResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('addreseller');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate and adding reseller into database
        $validate = Validator::make($request->all(),[
          'resellername'    => 'required|min:5',
          'resellerpassword'    => 'required|min:3',
          'reselleremail'   => 'required|email',
          'resellerbalance' => 'required|digits_between:3,9999999999'
        ]);
        if(!$validate->fails())
        {
          if(DB::table('users')->insert([
            'name'          => $request->resellername,
            'email'         => $request->reselleremail,
            'password'      => bcrypt($request->resellerpassword),
            'role'          => '0',
            'balance'       => $request->resellerbalance,
            'created_at'    => date('d/m/Y'),
            'updated_at'    => date('/d/m/Y')
          ]))
          {
            return view('addreseller')->with('success', $request->all());

          }
          else
          {
            return view('addreseller')->with('problem', $request->all());
          }
        }
        else
        {
          return view('addreseller')->withErrors($validate);
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
