<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
//require_once __DIR__ . '/vendor/autoload.php';

class RegisterSshController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key)
    {
        // returning server detail and registering ssh user here........
        if(Auth::check())
        {
          $server = DB::table('servers')->where('key', $key)->get();
          return view('create')->with('servers', $server);
        }
        else
        {
          return redirect()->intended('login');
        }
    }

    public function del($id)
    {
      if(DB::table('ssh_users')->where('id', $id)->count() > 0)
      {
        $details = DB::table('ssh_users')->where('id', $id)->get();
        $server  = DB::table('servers')->where('ip', $details[0]->on_server)->get();
        include(app_path() . "/lib/phpseclib/phpseclib/phpseclib/Net/SSH2.php");
        $command = new \phpseclib\Net\SSH2($server[0]->ip);
        if(!$command->login($server[0]->user, RegisterSshController::srvdecrypt($server[0]->password)))
        {
          return redirect('/setting/ssh');
        }
        else
        {
          DB::table('ssh_users')->where('id', $id)->delete();
          $command->exec('userdel ' . $details[0]->name);
          return redirect('/setting/ssh');
        }
      }
    }

    public static function srvdecrypt($string)
    {
      $result = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string))))))))));
      return $result;
    }

    public static function srvencrypt($string)
    {
      $result = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($string))))))))));
      return $result;
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
        $boom = new RegisterSshController();
        // create ssh account and inserted into database here
        if(Auth::check()) // make sure user has been logging on
        {
          if($dump = DB::table('servers')->where('key', $request->_key)->get())
          {
            if($prices = DB::table('app_data')->get())
            {
              $price = $dump[0]->prices;
              if(DB::table('ssh_users')->where('name', $request->sshname)->where('on_server', $dump[0]->ip)->count() > 0 )
              {
                return view('create')->with('userexist', $request->sshname);
              }
              else
              {
                include(app_path() . "/lib/phpseclib/phpseclib/phpseclib/Net/SSH2.php");
                $command = new \phpseclib\Net\SSH2($dump[0]->ip);
                if(!$command->login($dump[0]->user, RegisterSshController::srvdecrypt($dump[0]->password)))
                {
                  return view('create')->with('serverabort', $request->sshname);
                }
                else
                {
                  if(DB::table('users')->select('balance')->where('email', Auth::user()->email)->get()[0]->balance >= $price)
                  {
                    $valid = array(
                      'sshuser'     => $request->sshname,
                      'sshpass'     => $request->sshpass,
                      'sshcreated'  => date('d/m/Y'),
                      'sshexpired'  => $request->sshexpired,
                      'onserver'    => $dump[0]->name,
                      'serveruser'  => $dump[0]->user,
                      'serverpass'  => $dump[0]->password,
                      'serverip'    => $dump[0]->ip,
                      'sshprice'    => $price,
                      'command'     => $command
                    );

                    /**
                    * Create SSH User here..
                    **/
                    $command->exec('useradd ' . $request->sshname . ' -m -s /bin/false');
                    $command->exec('echo "' . $request->sshname . ':' . $request->sshpass . '" | chpasswd');

                    /**
                    ** Done!..
                    **/

                    if(DB::table('ssh_users')->insert([
                      'name'        => $request->sshname,
                      'password'    => $request->sshpass,
                      'created_at'  => date('d/m/Y'),
                      'expired_on'  => $request->sshexpired,
                      'on_server'   => $dump[0]->ip,
                      'reseller'    => Auth::user()->name
                    ]))
                    {
                      DB::table('users')->where('email', Auth::user()->email)->decrement('balance', $price);
                      return view('create')->with('valid', $valid);
                    }
                  }
                  else
                  {
                    return view('create')->with('balanceerror', Auth::user()->balance);
                  }
                }
              }
            }
            else
            {
              return view('create')->with('error', $request->sshname);
            }
          }
          else
          {
            return view('create')->with('serverabort', $request->sshname);
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
