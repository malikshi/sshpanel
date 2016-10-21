<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class CronController extends Controller
{
    //
    public function destroy()
    {
      /*

      Let's i tell the method to deleting user after his account expired.
      Firts! We need to retrieve Users expired by date.
      Second! after geting expired user list, We need to get "on_server" data.
      Third! after getting "on_server" we run database query to get server details with "on_server"
      Fourth! after that we jus deleted it!.

      */

      // Retrieve user expired.
      date_default_timezone_set('Asia/Jakarta');
      $now            = date('d/m/Y');
      $list_expired   = DB::table('ssh_users')->where('expired_on', $now)->get();
      foreach($list_expired as $list)
      {
        /* get "on_server" data. */
        $ip      = $list->on_server;

        /* get server details */
        $server  = DB::table('servers')->where('ip', $ip)->get();

        /* delete account!! */
        $command = new \phpseclib\Net\SSH2($server[0]->ip);
        if(!$command->login($server[0]->user,RegisterSshController::srvdecrypt($server[0]->password)))
        {
          return view('cron')->with('noconnect', $server);
        }
        else
        {
          // deleting database record!
          DB::table('ssh_users')->where('id', $list->id)->delete();

          // command to deleting user!
          $command->exec('userdel ' . $list->name);

          // display success messages
          echo "SSH User <b>" . $list->name . "</b> deleted successfully! <br />";
        }
      }
    }
}
