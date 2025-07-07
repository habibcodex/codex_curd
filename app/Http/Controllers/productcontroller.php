<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    // Show the form for creating a new product
    public function create()
    {
        return view('products.create');

    }

    public function store(Request $request) {
         $product = new Product();

        // Validate and store the product data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         $image = $request->file('image');
    if($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload'), $imageName);
        $product->image = $imageName;
    } else {
        $product->image = null; // Set to null if no image is uploaded
    }
        // Store the product data
       $product->name = $request->input('name');
       $product->description = $request->input('description');
       $product->save();
       flash()->success('Product created successfully!');

        return redirect()->route('index');

    }


    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
        
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate and update the product data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);
            $product->image = $imageName;
        }

        // Update the product data
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();

        flash()->success('Product updated successfully!');

        return redirect()->route('index');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        flash()->success('Product deleted successfully!');


        return redirect()->route('index');
    }

}
