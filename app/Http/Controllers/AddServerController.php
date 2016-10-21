<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\RegisterSshController;
use DB;
use Validator;

class AddServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    public static function randkey()
    {
      return substr(md5(base64_encode(uniqid())),0,20);
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
        //
        if(DB::table('servers')->where('ip', $request->serverip)->count() > 0 )
        {
          return view('addserver')->with('failed', $request->all());
        }
        else
        {
          $validate = Validator::make($request->all(),[
            'servername'    => 'required',
            'serverip'      => 'required|ip',
            'serveruser'    => 'required',
            'serverpass'    => 'required',
            'serverhost'    => 'required',
            'serverloc'     => 'required',
            'serverservice' => 'required',
            'serverports'   => 'required',
            'serverprices'  => 'required'
          ]);
          if(!$validate->fails())
          {
            if(DB::table('servers')->insert([
              'name'        => $request->servername,
              'ip'          => $request->serverip,
              'user'        => $request->serveruser,
              'password'    => RegisterSshController::srvencrypt($request->serverpass),
              'host'        => $request->serverhost,
              'location'    => $request->serverloc,
              'service'     => $request->serverservice,
              'port'        => $request->serverports,
              'key'         => AddServerController::randkey(),
              'prices'      => $request->serverprices
            ]))
            {
              return view('addserver')->with('success', $request->all());
            }
            else
            {
              return view('addserver')->with('failed', $request->all());
            }
          }
          else
          {
            // validate error
            return view('addserver')->withErrors($validate);
          }
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
