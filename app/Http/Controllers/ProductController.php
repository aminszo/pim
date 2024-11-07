<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::orderBy('stock_status', 'asc')
            ->orderBy('created_at', 'desc')->paginate(40);

        $stats = Product::getStats();

        // Pass the products data to the view and load the index view
        return view('product.index', compact('products', 'stats'));
    }

    public function create()
    {
        return view("product.create");
    }

    public function store(Request $request)
    {

        // Modify the request data before validation
        $request->merge([
            'answer_system' => $request->has('answer_system'), // Convert checkbox value to boolean
            'base_dial_pad' => $request->has('base_dial_pad'), // Convert checkbox value to boolean
            'has_persian' => $request->has('has_persian'),
            'bluetooth' => $request->has('bluetooth'),
            'is_second_hand' => $request->is_second_hand == '1' ? true : false,
            'box' => $request->has('box'),
        ]);

        // Validate the request data
        $validatedData = $request->validate([
            'code' => 'required|string|min:2|max:10',
            'name' => 'required|string|min:4|max:40',
            'brand' => 'required|string|min:2|max:40',
            'model' => 'nullable|string|min:2|max:40',
            'made_in' => 'nullable|string|min:1|max:40',
            'price' => 'required|numeric|min:0',
            'stock_status' => 'required|in:in-stock,out-of-stock',
            'stock_quantity' => 'nullable|integer|min:0|max:50',
            'type' => 'required|in:cordless,corded,hybrid',
            'handsets' => 'required|numeric|min:1|max:6',
            'answer_system' => 'nullable|boolean',
            'base_dial_pad' => 'nullable|boolean',
            'has_persian' => 'nullable|boolean',
            'bluetooth' => 'nullable|boolean',
            'lines' => 'required|integer|min:0|max:4',
            'is_second_hand' => 'required|boolean',
            'box' => 'required|boolean',
            'condition' => 'nullable|string|min:4|max:10',
            'grade' => 'nullable|string|min:1|max:2',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:300', // Adjust max file size as needed
        ]);

        // Create a new product instance with the validated data
        $product = new Product($validatedData);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->model . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $newImageName);
            $product->image_path = $newImageName;
        }

        // Save the product to the database
        $product->save();

        // Redirect the user to a success page or elsewhere
        return redirect()->route('products.index')->with('alert', 'محصول اضافه شد.');
    }

    public function show($id)
    {
        // Retrieve the product details from the database
        $product = Product::findOrFail($id);

        // Pass the product data to the view for rendering
        return view('product.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        // Modify the request data before validation
        $request->merge([
            'answer_system' => $request->has('answer_system'), // Convert checkbox value to boolean
            'base_dial_pad' => $request->has('base_dial_pad'), // Convert checkbox value to boolean
            'has_persian' => $request->has('has_persian'),
            'bluetooth' => $request->has('bluetooth'),
            'is_second_hand' => $request->is_second_hand == '1' ? true : false,
            'box' => $request->has('box'),
        ]);

        // Validate the request data
        $validatedData = $request->validate([
            'code' => 'required|string|min:2|max:10',
            'name' => 'required|string|min:4|max:40',
            'brand' => 'required|string|min:2|max:40',
            'model' => 'nullable|string|min:2|max:40',
            'made_in' => 'nullable|string|min:1|max:40',
            'price' => 'required|numeric|min:0',
            'stock_status' => 'required|in:in-stock,out-of-stock',
            'stock_quantity' => 'nullable|integer|min:0|max:50',
            'type' => 'required|in:cordless,corded,hybrid',
            'handsets' => 'required|numeric|min:1|max:6',
            'answer_system' => 'nullable|boolean',
            'base_dial_pad' => 'nullable|boolean',
            'has_persian' => 'nullable|boolean',
            'bluetooth' => 'nullable|boolean',
            'lines' => 'required|integer|min:0|max:4',
            'is_second_hand' => 'required|boolean',
            'box' => 'required|boolean',
            'condition' => 'nullable|string|min:4|max:10',
            'grade' => 'nullable|string|min:1|max:2',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:300', // Adjust max file size as needed
        ]);

        // Update the product with the validated data
        $product->update($validatedData);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->model . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $newImageName);
            $product->image_path = $newImageName;
        }

        $product->save();

        // Redirect the user back to the product details page with a success message
        return redirect()->route('products.show', $product->id)->with('success', 'محصول با موفقیت ویرایش شد.');
    }

    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product from the database
        $product->delete();

        // Redirect the user to a success page or elsewhere
        return redirect()->route('products.index')->with('alert', 'محصول حذف شد.');
    }
}
