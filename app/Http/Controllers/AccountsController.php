<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use App\Http\Requests;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check())
        {
          $details = Auth::user();
          return view('accounts')->with('details', $details);
        }
        else
        {
          return redirect()->intended('login');
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
        //
        if(isset($request->newmail))
        {
          // code to change email
          if((Hash::check($request->confpass, Auth::user()->password)))
          {
            $check = DB::table('users')->select('email')->where('email', $request->newmail)->count();
            if($check > 0 )
            {
              return view('accounts')->with('mailfailed', $request->newmail);
            }
            else
            {
              if(DB::table('users')->where('id', Auth::user()->id)->update(['email' => $request->newmail]))
              {
                return view('accounts')->with('mailsuccess', $request->newmail);
              }
              else
              {
                return view('accounts')->with('mailerror', $request->newmail);
              }
            }
          }
          else
          {
            return view('accounts')->with('passworderror', $request->newmail);
          }
        }
        elseif(isset($request->newname))
        {
          // code to change username
          if((Hash::check($request->confpass, Auth::user()->password)))
          {
            if(DB::table('users')->where('id', Auth::user()->id)->update(['name' => $request->newname]))
            {
              return view('accounts')->with('usersuccess', $request->newname);
            }
            else
            {
              return view('accounts')->with('usererror', $request->newname);
            }
          }
          else
          {
            return view('accounts')->with('passerror', $request->newname);
          }

        }
        elseif(isset($request->newpass))
        {
          // code to change password
            if(DB::table('users')->where('id', Auth::user()->id)->update(['password' => bcrypt($request->newpass)]))
            {
              return view('accounts')->with('passsukses', $request->newpass);
            }
            else
            {
              return view('accounts')->with('passerror', $request->newpass);
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
