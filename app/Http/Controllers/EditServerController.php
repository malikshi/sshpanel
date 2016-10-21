<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Validator;

class EditServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $query = DB::table('servers')->where('id', $id)->get();
        return view('edit')->with('data', $query);
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
        $query = DB::table('servers')->where('id', $id)->get();
        if(DB::table('ssh_users')->where('on_server', $query[0]->ip)->count() > 0)
        {
          $user  = DB::table('ssh_users')->where('on_server', $query[0]->ip)->get();
          return view('user')->with('users', $user);
        }
        else
        {
          return view('user')->with('nousers', $query[0]->ip);
        }
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
        if(DB::table('servers')->where('id', $id)->count() > 0 )
        {
          $query = DB::table('servers')->where('id', $id)->get();
          return view('update')->with('data', $query);
        }
        else
        {
          return view('update')->with('notfound', $id);
        }

    }

    public function reboot($id)
    {
      if(DB::table('servers')->where('id', $id)->count() > 0 )
      {
        $server  = DB::table('servers')->where('id', $id)->get();
        include(app_path() . "/lib/phpseclib/phpseclib/phpseclib/Net/SSH2.php");
        $command = new \phpseclib\Net\SSH2($server[0]->ip);
        if(!$command->login($server[0]->user, RegisterSshController::srvdecrypt($server[0]->password)))
        {
          return view('reboot')->with('failed', $server);
        }
        else
        {
          $command->exec('reboot');
          return view('reboot')->with('success', $server);
        }
      }

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
        $query = DB::table('servers')->where('id', $id)->get();
        DB::table('servers')->where('id', $id)->update([
          'name'      => $request->servername,
          'ip'        => $request->serverip,
          'user'      => $request->serveruser,
          'password'  => RegisterSshController::srvencrypt($request->serverpass),
          'host'      => $request->serverhost,
          'location'  => $request->serverloc,
          'port'      => $request->serverports,
          'prices'    => $request->serverprices
        ]);
        return view('update')->with('success', $request->all())->with('data', $query);
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
        if(DB::table('servers')->where('id', $id)->count() > 0)
        {
          // deleting server ...
          DB::table('servers')->where('id', $id)->delete();
          return view('delete')->with('success', $id);

        }
        else
        {
          return view('delete')->with('failed', $id);
        }
    }
}
