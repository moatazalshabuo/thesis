<?php

namespace App\Helper;

use App\Models\Supervision;
use App\Models\Thesis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function username($id)
    {
        return User::find($id)->name;
    }
    public static function thname($id)
    {
        return Thesis::find($id)->title_thesis;
    }
    public static function user($id)
    {
        return User::find($id);
    }

    public static function Thesis(){
        return Thesis::where(['students_id'=>Auth::id()])->where('status',"!=",3)->get()->first();
    }

    public static function CountStudents()
    {
        return count(User::where('type_user',3)->get());
    }


    public static function CountStaff()
    {
        return count(User::where('type_user',2)->get());
    }

    public static function CountThesisW()
    {
        return count(Thesis::where('status',1)->get());
    }
    public static function CountThesisF()
    {
        return count(Thesis::where('status',2)->get());
    }
    public static function CountThesisC()
    {
        return count(Thesis::where('status',3)->get());
    }
    public static function CountThesisN()
    {
        return count(Thesis::where('status',0)->get());
    }

    public static function CountS1(){
        return count(Supervision::where(['order_staff'=>1,"staff_id"=>Auth::id(),'status'=>1])->get());
    }
    public static function CountS2(){
        return count(Supervision::where(['order_staff'=>2,"staff_id"=>Auth::id(),'status'=>1])->get());
    }
    public static function CountSR(){
        return count(Supervision::where(["staff_id"=>Auth::id(),'status'=>0])->get());
    }

    public static function CountSF(){
        return count(Supervision::where(["staff_id"=>Auth::id(),'status'=>2])->get());
    }
}
