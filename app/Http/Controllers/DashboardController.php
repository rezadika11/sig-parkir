<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }
   public function Dashboard(){
       return view('dashboard.index');
   }
}
