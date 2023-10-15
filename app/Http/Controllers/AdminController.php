<?php

namespace App\Http\Controllers;

use App\Models\Supervision;
use App\Models\Thesis;
use App\Models\User;
use App\Notifications\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create_thesis()
    {

        $students = User::where('type_user', 3)->whereNotIn('id', Thesis::pluck('students_id')->toarray())->get();

        $staff = User::where('type_user', 2)->get();

        return view('admin/create_thises', compact('students', 'staff'));
    }

    public function store_thesis(Request $request)
    {
        $request->validate([
            'title_thesis' => ['required'],
            'en_title' => ['required'],
            'students' => ['required'],
            'staff1' => ['required'],
            'staff2' => ['different:staff1']
        ]);


        $thesis = new Thesis();
        $thesis->students_id = $request->students;
        $thesis->title_thesis = $request->input('title_thesis');
        $thesis->en_title = $request->input('en_title');
        $thesis->status = 0;
        $thesis->save();

        foreach (User::where('type_user', 1)->get() as $val) {
            User::find($val->id)->notify(new Notifications([
                'title' => "تم اضافة اطروحة بعنوان $thesis->title_thesis",
                "link" => route('theses.admin'), 'time' => date('Y-m-d H:i')
            ]));
        }

        Supervision::create([
            'thesis_id' => $thesis->id,
            "staff_id" => $request->input('staff1'),
            "order_staff" => (1),
            "status" => 0
        ]);
        if ($request->input('staff2'))
            Supervision::create([
                'thesis_id' => $thesis->id,
                "staff_id" => $request->input('staff2'),
                "order_staff" => (2),
                "status" => 0
            ]);
        User::find($request->input('staff1'))->notify(new Notifications([
            'title' => "تم طلب الاشراف على اطروحة بعنوان $thesis->title_thesis",
            "link" => route('staff.SupervisionRequests'), 'time' => date('Y-m-d H:i')
        ]));
        if ($request->input('staff2'))
            User::find($request->input('staff2'))->notify(new Notifications([
                'title' => "تم طلب الاشراف على اطروحة بعنوان $thesis->title_thesis",
                "link" => route('staff.SupervisionRequests'), 'time' => date('Y-m-d H:i')
            ]));

        return redirect()->route('theses.admin')->with('success', 'تم الاضافة بنجاح');
    }

    public function CancelThises()
    {
        $theses = Thesis::where('status', 3)->get();

        return view('admin.thises_canceled', compact('theses'));
    }

    public function StfTheses($id)
    {
        $theses = Thesis::whereIn('id', Supervision::where('staff_id', $id)->pluck('thesis_id')->toarray())->get();
        return view('admin.thises_canceled', compact('theses'));
    }
}
