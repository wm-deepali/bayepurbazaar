<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MandalMember;
use App\Models\Mandal;

class MandalMemberController extends Controller
{

    public function index()
    {
        $members = MandalMember::with('mandal')->latest()->get();

        return view('admin.mandal-members.index',compact('members'));
    }


    public function create()
    {
        $mandals = Mandal::where('status',1)->get();

        return view('admin.mandal-members.create',compact('mandals'));
    }


    public function store(Request $request)
    {

        $request->validate([

            'mandal_id' => 'required',

            'name' => 'required',

            'mobile' => 'required'

        ]);


        MandalMember::create([

            'mandal_id' => $request->mandal_id,

            'name' => $request->name,

            'designation' => $request->designation,

            'mobile' => $request->mobile,

            'whatsapp' => $request->whatsapp,

            'email' => $request->email,

            'status' => $request->status ? 1 : 0

        ]);


        return redirect()->route('admin.mandal-members.index')
            ->with('success','Member Added Successfully');

    }


    public function edit($id)
    {

        $member = MandalMember::findOrFail($id);

        $mandals = Mandal::where('status',1)->get();

        return view('admin.mandal-members.edit',compact('member','mandals'));

    }


    public function update(Request $request,$id)
    {

        $member = MandalMember::findOrFail($id);

        $request->validate([

            'mandal_id' => 'required',

            'name' => 'required',

            'mobile' => 'required'

        ]);


        $member->update([

            'mandal_id' => $request->mandal_id,

            'name' => $request->name,

            'designation' => $request->designation,

            'mobile' => $request->mobile,

            'whatsapp' => $request->whatsapp,

            'email' => $request->email,

            'status' => $request->status ? 1 : 0

        ]);


        return redirect()->route('admin.mandal-members.index')
            ->with('success','Member Updated Successfully');

    }


    public function destroy($id)
    {

        MandalMember::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Member Deleted Successfully'
        ]);

    }

}