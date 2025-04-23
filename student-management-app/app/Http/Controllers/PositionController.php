<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::paginate(3);
        return view('admin.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $position = new Position();
        $position->name = $request->name;
        $position->save();
        return redirect()->route('position-list')->with('success', 'Position saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rows = Position::findOrFail($id);
        // dd($rows->all());
        return view('admin.position.update', compact('rows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);

        $request->validate([

            'name' => 'required|string|max:255',
            // dd($request->name),           //     // 'updated_by' => Auth::user()->id,
            //     // dd(Auth::user()->id)

        ]);

        try {
            $position->name  = $request->name;
            $position->update();
            return redirect()->route('position-list')->with('success', 'Position updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);

        try {
            $position->delete();
            $position->save();
            return redirect()->route('position-list')->with('success', 'Position deleted successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
