<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $thesis = "";
        if(Auth::user()->type_user == 3){
            $thesis = Thesis::where(['students_id'=>Auth::id()])->where('status',"!=",3)->get()->first();
        }
        return view('home',compact('thesis'));
    }
}
