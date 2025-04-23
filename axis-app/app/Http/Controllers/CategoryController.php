<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  = $request->input('search');

        $category_searchs = Category::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->get();

        $categories = Category::paginate(3);

        return view('category.index', compact('categories', 'search', 'category_searchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->profile);
        $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        try {
            $existingCategory = Category::where('name', $request->name)->first();

            if ($existingCategory) {
                return redirect()
                    ->route('category-list', $existingCategory->id)
                    ->withInput()
                    ->with('error', 'Category name already exists!');
            } else {
                $imageName = time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('category_image'), $imageName);

                Category::create([

                    'name' => $request->name,
                    'photo' =>   $imageName,

                ]);
            }





            return redirect()->route('category-list')->with('success', 'Categoy created successfully!.');
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function edit(string $id)
    {
        $rows = Category::findOrFail($id);

        return view('category.update', compact('rows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:255',
            //|unique:categories,name,' . $categories->id

            'profile' => 'image|mimes:jpeg,png,jpg,gif'
        ]);


        try {

            if ($request->name != $categories->name) {


                $existingCategory = Category::where('name', $request->name)->first();

                if ($existingCategory) {

                    return redirect()
                        ->route('edit-category', $existingCategory->id)
                        ->withInput()
                        ->with('error', 'Category name already exists!');
                } else {
                }
            }


            $imageName = $categories->photo;

            if ($request->hasFile('profile')) {
                if ($categories->profile) {
                    if (file_exists((string)$categories->profile)) {
                        unlink($categories->profile);
                    }
                }

                $imageName = time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('category_image'), $imageName);
            } else {
                $imageName = $categories->photo;
            }


            $categories->update([
                'name' => $request->name,

                'photo' => $imageName,


            ]);

            return redirect()->route('category-list')->with('success', 'Category updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Category::findOrFail($id);
        if ($row->photo) {
            if (file_exists((string)$row->photo)) {
                unlink($row->photo);
            }
        }
        $row->delete();
        //$row->deleted_by = Auth::user()->id;
        $row->save();


        return redirect()->route('category-list')->with('success', 'Category deleted successfully.');
    }
}
