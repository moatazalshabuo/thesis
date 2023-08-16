<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Supervision;
use App\Models\Thesis;
use App\Models\User;
use App\Notifications\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DiscussionController extends Controller
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

    public function store(Request $request)
    {
        // Validate and save discussion data
        $validated = $request->validate([
            'title' => 'required',
            'file' => 'required',
            'thesis_id' => 'required|exists:theses,id'
        ]);

        $discussion = new Discussion;
        $discussion->title = $validated['title'];
        $discussion->thesis_id = $validated['thesis_id'];

        // Save discussion file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('files'), $filename);

            $discussion->file = 'files/' . $filename;
        }

        $discussion->save();

        foreach(Supervision::where(['thesis_id'=>$request->thesis_id,'status'=>1])->get() as $val){
            User::find($val->staff_id)->notify(new Notifications(['title'=>" تم اضافة ملف في الاطروحة ".Thesis::find($request->thesis_id)->title_thesis,
            "link"=>route('thesis.show',$request->thesis_id),'time'=>date('Y-m-d H:i')]));
        }
        return redirect()->back()->with('success', 'تمت الإضافة بنجاح!');
    }

    public function destroy($id)
    {
        $discussion = Discussion::findOrFail($id);

        // Delete file
        if($discussion->file) {
            $filePath = public_path($discussion->file);
            File::delete($filePath);
          }
        // Delete discussion
        $discussion->delete();

        return redirect()->back()->with('success', 'تم الحذف بنجاح!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        // print_r($discussion);
        $discussion = Discussion::with('thesis')->where('id',$discussion->id)->get()[0];
        return view("students/messages", compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }
}
