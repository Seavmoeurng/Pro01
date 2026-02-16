<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subCategories = SubCategory::where("status",1)->get();
        $data=[
        'subCategories'=>SubCategory::where('status',1)->get(),
        'categories'=> Category::where('status',1)->get(),
        ];
        return view('Subcategory.subcategory')->with($data);

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
        $subCategories = SubCategory::create([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'user_id'=>Auth::user()->id,
            'status'=>1,
        ]);
        return redirect()->back()->with('success','SubCategory Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)//edit page
    {
        $request->validate([
            'name'=> 'required|string|max:255|unique:subcategories,name',
        ]);
        $subcategories = SubCategory::findOrFail($id)->update([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'user_id'=> Auth::user()->id,
            'status'=> 1,
        ]);
        return redirect()->back()->with('success','Subcateogry Edited!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $subcategories = SubCategory::findOrFail($id)->update(['status'=> 0,]);
        return redirect()->back()->with('success','Subcateogry Edited!!!');
    }
}
