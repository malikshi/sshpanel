<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Validator;

class UserTopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(DB::table('users')->where('role', '0')->count() < 0)
        {
          return view('usertopup')->with('noreseller', '0');
        }
        else
        {
          return view('usertopup')->with('resellers', DB::table('users')->where('role', '0')->get());
        }
    }

    public function topup($id)
    {
      if(DB::table('users')->where('id', $id)->count() > 0)
      {
        $resname = DB::table('users')->where('id', $id)->get();
        $resname = array(
          'name' => $resname[0]->name,
          'id'   => $resname[0]->id
        );
        return view('topupuser')->with('id', $resname);
      }
      else
      {
        return view('topupuser')->with('nouser', $id);
      }
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
        // validate and topuping reseller
        if(DB::table('users')->where('id', $request->_id)->count() > 0)
        {
          $validate = Validator::make($request->all(),[
            'amount' => 'required|digits_between:1,999999999999999999'
          ]);
          if(!$validate->fails())
          {
            if(DB::table('users')->where('id', $request->_id)->increment('balance', $request->amount))
            {
              $success = array(
                'success' => DB::table('users')->where('id', $request->_id)->get(),
                'amount'  => $request->amount
              );
              return view('topupuser')->with('topupsuccess', $success);
            }
            else
            {
              return view('topupuser')->with('topupfailed', $request->all());
            }
          }
          else
          {
            return view('topupuser')->withErrors($validate);
          }
        }
        else
        {
          return view('topupuser')->with('usernotexists', $request->_id);
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
