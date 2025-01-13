<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Models\ProductModel;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = ProductModel::orderBy('id','desc')->Paginate(5);
        $query = ProductModel::query();

        if ($request->has('category') && $request->category!= '') {
            $query->where('category', $request->category);
        }
        $products = $query->orderBy('id','desc')->Paginate(5);
        $categories = ProductModel::select('category')->distinct()->get();
        //$products = ProductModel::orderBy('id')->take(10)->get();
        return view("products.index"    , compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath; // Add the file path to validated data
        } else {
            return back()->withErrors(['image' => 'Image upload failed.'])->withInput();
        }
        ProductModel::create($validatedData);

return redirect()->route('products.index')->with('success','Producted Inserted Successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = ProductModel::findOrFail($id); // Fetch the product by ID
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);
    
        $product = ProductModel::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock'),
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Log::info('Request to delete product ID: ' . $id);
         $product = ProductModel::findOrFail($id);
         $product->delete();
         return redirect()->to('/products')->with('success','Product Deleted Successfully');
    }
}
