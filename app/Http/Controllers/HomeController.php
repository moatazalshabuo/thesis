<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use App\Models\User;
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

    public function noty()
    {
        return view('notyfication');
    }

    public function archive(Request $request)
    {
        $student = User::where('type_user',3)->get();
        $superviser = User::where('type_user',2)->get();
        $query = Thesis::query();
        if (isset($_GET['student'])) {
            $query->where('students_id',$_GET['student']);
        }
        if(isset($_GET['superviser'])){
            $query->where('rate1',$_GET['superviser'])->orWhere('rate1',$_GET['superviser']);
        }
        
        if(!empty($_GET)){
            $thesis = $query->get();
        }else{
            $thesis = [];
        }
        
        return view('archive',compact('student','superviser','thesis'));
    }
}
