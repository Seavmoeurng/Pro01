<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'products' => Product::where('status', 1)->get(),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => SubCategory::where('status', 1)->get(),
        ];

        return view('Products.product')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'products' => Product::where('status', 1)->get(),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => SubCategory::where('status', 1)->get(),
        ];

        return view('Products.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validation
    $request->validate([
        'name'           => 'required|string|max:255',
        'category_id'    => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:sub_categories,id',
        'price'          => 'required|integer|min:0',
        'qty'            => 'required|integer|min:0',
        'image'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
    ]);

    // 2. Prepare Data
    // We create the array manually to include the status and user_id
    $data = [
        'name'           => $request->name,
        'category_id'    => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'description'    => $request->description,
        'price'          => $request->price,
        'qty'            => $request->qty,
        'status'         => 1,
        'user_id'        => Auth::user()->id, // Shorthand for Auth::user()->id
    ];

    // 3. Handle Image Upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        
        // Ensure the folder exists in public/uploads/products
        $file->move(public_path('images/products'), $filename);
        
        // Update the image string in our data array
        $data['image'] = $filename;
    }

    // 4. Save to Database
    Product::create($data);

    return redirect()->route('product.index')->with('success', 'Product created!');
}
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    // 1. Validation (Matches your Store logic)
    $request->validate([
        'name'           => 'required|string|max:255',
        'category_id'    => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:sub_categories,id',
        'price'          => 'required|integer|min:0',
        'qty'            => 'required|integer|min:0',
        'image'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
    ]);

    // 2. Prepare Data (Exclude image for now)
    $data = [
        'name'           => $request->name,
        'category_id'    => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'price'          => $request->price,
        'qty'            => $request->qty,
        // Status usually stays the same or comes from a checkbox
    ];

    // 3. Handle Image Update
    if ($request->hasFile('image')) {
        // Delete the OLD image from the folder to save space
        if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
            unlink(public_path('images/products/' . $product->image));
        }

        // Upload the NEW image
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/products'), $filename);
        
        // Add new filename to the data array
        $data['image'] = $filename;
    }

    // 4. Update the Database
    $product->update($data);

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->update([
            'status' => 0,
        ]);

        return redirect()->back();
    }
//     public function getSubcategories($categoryId)
// {
//     $subcategories = SubCategory::where('category_id', $categoryId)->get();
//     return response()->json($subcategories);
// }
    public function getSubcategories($categoryID) {
        $subcategories = SubCategory::where('category_id', $categoryID)->get();
        return response()->json($subcategories);
    }
}
