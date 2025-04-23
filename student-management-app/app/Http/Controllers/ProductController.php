<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(5);
        return view('product.index', compact('products', 'categories'));
    }
    //filter product by category

    public function filter(Request $request)
    {

        $categories = Category::all();
        $query = Product::with('category');

        if ($request->category_id) {

            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()->paginate(5);

        return view('product.index', compact('categories', 'products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif',
            'price' => 'required',
        ]);
        try {
            //check name in product table  if already 
            $existingProduct = Product::where('name', $request->name)->first();

            if ($existingProduct) {
                return redirect()
                    ->route('product-list', $existingProduct->id)
                    ->withInput()
                    ->with('error', 'Product name already exists!');
            } else {
                $imageName = time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('product_image'), $imageName);

                Product::create([
                    'category_id' => $request->category,
                    'name' => $request->name,
                    'photo' =>   $imageName,
                    'price' => $request->price,
                    'description' => $request->description,
                ]);
            }

            return redirect()->route('product-list')->with('success', 'Categoy created successfully!.');
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function edit(string $id)
    {
        $rows = Product::findOrFail($id);

        $categories = Category::with('products')->get();

        return view('product.update', compact('rows', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::findOrFail($id);

        //dd($products->name, $request->name);
        $request->validate([

            // 'name' => 'required|string|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif',
            'price' => 'required',

        ]);

        try {


            if ($request->name != $products->name) {

                $existingProduct = Product::where('name', $request->name)->first();

                if ($existingProduct) {
                    return redirect()
                        ->route('product-list', $existingProduct->id)
                        ->withInput()
                        ->with('error', 'Product name already exists!');
                }
            } else {

                $imageName = $products->photo;

                if ($request->hasFile('profile')) {
                    if ($products->profile) {
                        if (file_exists((string)$products->profile)) {
                            unlink($products->profile);
                        }
                    }

                    $imageName = time() . '.' . $request->profile->extension();
                    $request->profile->move(public_path('product_image'), $imageName);
                } else {
                    $imageName = $products->photo;
                }


                $products->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'photo' => $imageName,
                    'category_id' => $request->category_id,

                ]);

                return redirect()->route('product-list')->with('success', 'Product update successfull!.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
