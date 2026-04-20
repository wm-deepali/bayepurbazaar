<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MandalCategory;
use Illuminate\Support\Str;

class MandalCategoryController extends Controller
{
    // ✅ LIST
    public function index()
    {
        $categories = MandalCategory::latest()->get();

        return view('admin.mandal-categories.index', compact('categories'));
    }

    // ✅ CREATE
    public function create()
    {
        return view('admin.mandal-categories.create');
    }

    // ✅ STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:mandal_categories,name'
        ]);

        MandalCategory::create([
            'name' => $request->name,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandal-categories.index')
            ->with('success', 'Category Created Successfully');
    }

    // ✅ EDIT
    public function edit($id)
    {
        $category = MandalCategory::findOrFail($id);

        return view('admin.mandal-categories.edit', compact('category'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $category = MandalCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:mandal_categories,name,' . $id
        ]);

        $category->update([
            'name' => $request->name,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandal-categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        MandalCategory::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Category Deleted Successfully'
        ]);
    }
}