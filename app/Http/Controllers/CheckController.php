<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class CheckController extends Controller
{
    //
    public function check() {
      if(Auth::check()) {
        return redirect()->intended('home');
      } else {
        return redirect()->intended('/login');
      }
    }
}
