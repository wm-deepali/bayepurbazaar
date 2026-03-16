<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Generate slug
        $slug = Str::slug($request->name);

        if(empty($slug)){
            $slug = str_replace(' ','-',$request->name);
        }

        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;

        while(Category::where('slug',$slug)->exists()){
            $slug = $originalSlug.'-'.$count;
            $count++;
        }

        // Upload image
        $imageName = null;

        if($request->hasFile('image')){

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/categories'),$imageName);

        }


        Category::create([

            'name' => $request->name,

            'slug' => $slug,

            'image' => $imageName,

            'is_popular' => $request->is_popular ? 1 : 0,

            'status' => $request->status ? 1 : 0,

            'show_header' => $request->show_header ? 1 : 0,

            'show_footer' => $request->show_footer ? 1 : 0,

        ]);

        return redirect()->route('admin.categories.index')
            ->with('success','Category Created Successfully');

    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        // Generate slug
        $slug = Str::slug($request->name);

        if(empty($slug)){
            $slug = str_replace(' ','-',$request->name);
        }

        $originalSlug = $slug;
        $count = 1;

        while(Category::where('slug',$slug)->where('id','!=',$id)->exists()){
            $slug = $originalSlug.'-'.$count;
            $count++;
        }


        $imageName = $category->image;

        if($request->hasFile('image')){

            // Delete old image
            if($category->image && file_exists(public_path('uploads/categories/'.$category->image))){
                unlink(public_path('uploads/categories/'.$category->image));
            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/categories'),$imageName);

        }


        $category->update([

            'name' => $request->name,

            'slug' => $slug,

            'image' => $imageName,

            'is_popular' => $request->is_popular ? 1 : 0,

            'status' => $request->status ? 1 : 0,

            'show_header' => $request->show_header ? 1 : 0,

            'show_footer' => $request->show_footer ? 1 : 0,

        ]);

        return redirect()->route('admin.categories.index')
            ->with('success','Category Updated Successfully');

    }


    public function destroy($id)
    {

        $category = Category::findOrFail($id);

        // Delete image
        if($category->image && file_exists(public_path('uploads/categories/'.$category->image))){
            unlink(public_path('uploads/categories/'.$category->image));
        }

        $category->delete();

        return response()->json([
            'message'=>'Category Deleted Successfully'
        ]);

    }

}