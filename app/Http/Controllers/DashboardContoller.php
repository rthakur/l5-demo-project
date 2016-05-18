<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class DashboardContoller extends Controller
{
    public function getIndex(){

      if(!Auth::check()) return redirect('login');

      return redirect('user');
    }

}
