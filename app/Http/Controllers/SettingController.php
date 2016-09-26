<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class SettingController extends Controller
{
    //
    public function index() {
      if(Auth::check()) {
        if(Auth::user()->role == 1) {
          return view('setting');
        } else {
          return redirect()->intended('/home');
        }
      } else {
        return redirect()->intended('login');
      }
    }
}
