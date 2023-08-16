<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Supervision;
use App\Models\Thesis;
use App\Models\User;
use App\Notifications\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Output\Theme;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = User::where('type_user', 2)->paginate();

        return view('staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('staffs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_acadmi' => 'required|integer',
            'type_user' => 'required|integer',
        ]);

        User::create($data);

        return redirect('/staffs');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('staffs.edit', compact('user'));
    }
    public function show()
    {
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'num_acadmi' => 'required|integer',
        ]);

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect('/staffs');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/staffs');
    }

    public function Supervision()
    {
        $thesis = Supervision::with('thesis')->where(['staff_id' => Auth::id(), 'status' => 1])->get();
        return view("staffs/supervision", compact('thesis'));
    }

    public function fSupervision()
    {
        $thesis = Supervision::with('thesis')->where(['staff_id' => Auth::id(), 'status' => 1])->get();
        return view("staffs/fisupervision", compact('thesis'));
    }
    public function SupervisionRequests()
    {
        $thesis = Supervision::with('thesis')->where(['staff_id' => Auth::id(), 'status' => 0])->get();
        return view("staffs/supervisionRequest", compact('thesis'));
    }

    public function active($id)
    {
        $su = Supervision::find($id);
        $su->update([
            'status' => 1
        ]);
        User::find(Thesis::find($su->thesis_id)->students_id)->notify(new Notifications([
            'title' => " تم اضافة الموفقة على الاشراف بواسطة  " . Helper::username($su->staff_id),
            "link" => "#", 'time' => date('Y-m-d H:i')
        ]));
        return redirect()->back()->with('success', "تم الموافقة بنجاح ");
    }

    public function deactive($id)
    {
        $su = Supervision::find($id);
        $su->update([
            'status' => 3
        ]);
        User::find(Thesis::find($su->thesis_id)->students_id)->notify(new Notifications([
            'title' => " تم اضافة رفض على الاشراف بواسطة  " . Helper::username($su->staff_id),
            "link" => "#", 'time' => date('Y-m-d H:i')
        ]));
        return redirect()->back()->with('success', "تم الرفض بنجاح ");
    }

    public function SupervisionOwn($id)
    {
        $supervision = Supervision::where("thesis_id", $id)->orderBy("order_staff")->get();

        $staff = User::whereNotIn('id',Supervision::where("thesis_id",$id)->pluck('staff_id'))->where('type_user',2)->get();

        return view("students/supervision", compact('supervision','staff'));
    }

    public function changeSupervision1(Request $request){
        $su = Supervision::find($request->id_supervision);
        $su->update([
            'staff_id'=>$request->staff,
            'status'=>0
        ]);
        $thesis = Thesis::find($su->thesis_id);

        User::find($request->staff)->notify(new Notifications([
            'title' => "تم طلب الاشراف على اطروحة بعنوان $thesis->title_thesis",
            "link" => route('staff.SupervisionRequests'), 'time' => date('Y-m-d H:i')
        ]));
        return redirect()->back()->with('success', "تم تغيير مشرف بنجاح ");
    }
}
