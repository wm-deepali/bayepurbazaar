<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mandal;
use App\Models\MandalCategory;
use Illuminate\Support\Str;

class MandalController extends Controller
{
    // ✅ LIST
    public function index()
    {
        $mandals = Mandal::with('category')->latest()->get();

        return view('admin.mandals.index', compact('mandals'));
    }

    // ✅ CREATE FORM
    public function create()
    {
        $categories = MandalCategory::where('status', 1)->get();

        return view('admin.mandals.create', compact('categories'));
    }

    // ✅ STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:mandals,name',
            'mandal_category_id' => 'required|exists:mandal_categories,id'
        ]);

        $slug = Str::slug($request->name);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->name);
        }

        Mandal::create([
            'name' => $request->name,
            'slug' => $slug,
            'mandal_category_id' => $request->mandal_category_id,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandals.index')
            ->with('success', 'Mandal Created Successfully');
    }

    // ✅ EDIT FORM
    public function edit($id)
    {
        $mandal = Mandal::findOrFail($id);
        $categories = MandalCategory::where('status', 1)->get();

        return view('admin.mandals.edit', compact('mandal', 'categories'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $mandal = Mandal::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:mandals,name,' . $id,
            'mandal_category_id' => 'required|exists:mandal_categories,id'
        ]);

        $slug = Str::slug($request->name);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->name);
        }

        $mandal->update([
            'name' => $request->name,
            'slug' => $slug,
            'mandal_category_id' => $request->mandal_category_id,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandals.index')
            ->with('success', 'Mandal Updated Successfully');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        Mandal::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Mandal Deleted Successfully'
        ]);
    }

}