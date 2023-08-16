<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Supervision;
use App\Models\Thesis;
use App\Models\User;
use App\Notifications\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = Thesis::where('students_id', Auth::id())->get();
        return view('students/thesis', compact('theses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thesis = Thesis::where('status', "!=", 3)->where('students_id', Auth::id())->get()->first();
        $staff = User::Staff();
        return view("students/create-thesis", compact('staff', 'thesis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_thesis' => 'required|max:100',
            'en_title' => 'required|max:100',
            'staff1' => 'required|integer',
            'staff2' => 'nullable|integer',
        ]);
        $thesis = new Thesis();
        $thesis->students_id = Auth::id();
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
        User::find($request->input('staff1'))->notify(new Notifications([
            'title' => "تم طلب الاشراف على اطروحة بعنوان $thesis->title_thesis",
            "link" => route('staff.SupervisionRequests'), 'time' => date('Y-m-d H:i')
        ]));

        return redirect()->route('theses.index')->with('success', ' تمت الاضافة في انتظار موافقة المشرفين');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thesis $thesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thesis $thesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thesis $thesis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thesis $thesis)
    {
        //
    }

    public function indexAdmin()
    {
        $theses = Thesis::where('status', 0)->paginate(15);
        return view('theses/index', compact('theses'));
    }

    public function indexFAdmin()
    {
        $theses = Thesis::where('status', 2)->paginate(15);
        return view('theses/indexfull', compact('theses'));
    }
    public function indexAAdmin()
    {
        $theses = Thesis::where('status', 1)->paginate(15);
        return view('theses/index_active', compact('theses'));
    }
    public function showAdmin($id)
    {
        $these = Thesis::find($id);
        $staff = Supervision::with('staff')->where('thesis_id', $id)->get();
        return view('theses/profile', compact('these', 'staff'));
    }

    public function  activeAdmin($id)
    {
        $th = Thesis::find($id);
        $th->update([
            "status" => 1
        ]);
        User::find($th->students_id)->notify(new Notifications([
            'title' => "تم الموافقة على اطروحتك المقدمة",
            "link" => route('thesis.show', $th->id), 'time' => date('Y-m-d H:i')
        ]));

        return redirect()->back()->with("success", "تم الموافقة بنجاح");
    }

    public function  dsactiveAdmin($id)
    {
        $th = Thesis::find($id);
        $th->update([
            "status" => 3
        ]);
        User::find($th->students_id)->notify(new Notifications([
            'title' => " تم رفض اطروحتك المقدمة التقدم باطروحة اخرى",
            "link" => route('theses.create'), 'time' => date('Y-m-d H:i')
        ]));
        return redirect()->back()->with("success", "تم الرفض بنجاح");
    }

    public function Thesis($id)
    {
        $thesis = Thesis::find($id);
        $Discussion = Discussion::where('thesis_id', $id)->orderBy('id', "desc")->get();
        return view('students/message-thesis', compact('thesis', 'Discussion'));
    }


    public function rate1(Request $request)
    {
        // print_r(Thesis::find($request->id));die();
        $t = Thesis::find($request->id);
        $t->update([
            'rate1' => $request->rate
        ]);
        return redirect()->back()->with("success", "تم التقييم بنجاح");
    }
    public function rate2(Request $request)
    {
        $t = Thesis::find($request->id);
        $t->update([
            'rate2' => $request->rate
        ]);
        return redirect()->back()->with("success", "تم التقييم بنجاح");
    }

    public function finish($id)
    {
        $t = Thesis::find($id);
        $t->update([
            'status' => 2
        ]);
        return redirect()->back()->with("success", "تم التحديث بنجاح بنجاح");
    }
    public function unfinish($id)
    {
        $t = Thesis::find($id);
        $t->update([
            'status' => 1
        ]);
        return redirect()->back()->with("success", "تم التحديث بنجاح بنجاح");
    }
}
