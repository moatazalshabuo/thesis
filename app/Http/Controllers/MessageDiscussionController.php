<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Discussion;
use App\Models\MessageDiscussion;
use App\Models\Supervision;
use App\Models\Thesis;
use App\Models\User;
use App\Notifications\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageDiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messageDiscussion = new MessageDiscussion();

        $messageDiscussion->message = $request->message;
        $messageDiscussion->created_by = Auth::user()->name;
        $messageDiscussion->user_id = Auth::id();
        $messageDiscussion->disc_id = $request->disc_id;

        $messageDiscussion->save();

        $d = Discussion::find($request->disc_id)->thesis_id;
        $thesis = Thesis::find($d);
        if ($messageDiscussion->user_id == $thesis->students_id) {
            foreach (Supervision::where(['thesis_id', $d, "status" => 1])->get() as $key => $value) {
                User::find($value->staff_id)->notify(new Notifications([
                    'title' => " تم اضافة ملاحظة بواسطة  ". Helper::username($messageDiscussion->user_id),
                    "link" => route('discussion.show', $request->disc_id), 'time' => date('Y-m-d H:i')
                ]));
            }
        } else {
            User::find($thesis->students_id)->notify(new Notifications([
                'title' => " تم اضافة ملاحظة بواسطة  ". Helper::username($messageDiscussion->user_id),
                "link" => route('discussion.show', $request->disc_id), 'time' => date('Y-m-d H:i')
            ]));
        }
        return redirect()->back()->with("success", "تم الحفظ بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageDiscussion $messageDiscussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MessageDiscussion $messageDiscussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MessageDiscussion $messageDiscussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageDiscussion $messageDiscussion)
    {
        $messageDiscussion->delete();

        return redirect()->back()->with("success", "تم الحذف بنجاح");
    }
}
