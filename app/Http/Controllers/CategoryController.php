<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->paginate(10);

        return view('Category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // leave this empty because we use one page no need this
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        Category::create([
            'name' => $request->name,
            'user_id'=>Auth::user()->id,
            'status'=>1,
        ]);
        return redirect()->back()->with('success','Cateogry added Successfully !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)//use for editing
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            // 'name' => 'required|string|max:255',
        ]);
        
        Category::findOrFail($id)->update([
            'name'=> $request->name,
        ]);

        return redirect()->back()->with('success','Category Updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        Category::findOrFail($id)->update([
            'status'=>0,
        ]);
        return redirect()->back()->with('success','Category Remove (Change Status)');
    }
}
