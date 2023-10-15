<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Discussion;
use App\Models\SecreatRate;
use App\Models\Thesis;
use App\Models\User;
use App\Notifications\Notifications;
use Illuminate\Console\View\Components\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecreatRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->type_user == 2)
            $secret = SecreatRate::with('Staff')->with('theses')->where('staff',Auth::id())->orderBy('created_at',"DESC")->get();
        else
            $secret = SecreatRate::with('Staff')->with('theses')->orderBy('created_at',"DESC")->get();
        return view('secret.index',compact('secret'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staff = User::where('type_user',2)->get();
        $theses = Thesis::all();

        return view('secret.create',compact('staff','theses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = SecreatRate::create([
            'staff'=>$request->staff,
            'theses_id'=>$request->theses
        ]);
        User::find($request->staff)->notify(new Notifications([
            'title' => " تم تعيينك كمقيم سري للاطروحة  ". Helper::thname($request->theses),
            "link" => route('secret.show', $id->id), 'time' => date('Y-m-d H:i')
        ]));

        return redirect()->route('secret.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secret = SecreatRate::find($id);
        $discussion = Discussion::where('thesis_id',$secret->theses_id)->orderBy('created_at','DESC')->first();
        // print_r($discussion);die();
        return view('secret.show',compact('secret','discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SecreatRate $secreatRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secret = SecreatRate::find($id);
        $secret->update([
            'rate'=>$request->rate,
            'message'=>$request->message,
            'status'=>1
        ]);
        foreach(User::where('type_user',1)->get() as $val){
            $val->notify(new Notifications([
                'title' => " تم تقييم اطروحة  ". Helper::thname($secret->theses_id),
                "link" => route('secret.show', $id), 'time' => date('Y-m-d H:i')
            ]));
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $secreatRate = SecreatRate::find($id);
        $secreatRate->delete();
        return redirect()->back();
    }
}
