<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Controllers\Controller;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  = $request->input('search');

        $status_searchs = Status::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->get();

        $statuses = Status::all();
        return view('admin.status.index', compact('statuses', 'status_searchs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            ['name' => 'required|string|max:255',]

        );
        try {
            $status = new Status();
            $status->name = $request->name;
            $status->save();
            return redirect()->route('status-list')->with('success', 'Status saved successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rows = Status::findOrFail($id);

        return view('admin.status.update', compact('rows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $status = Status::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $status->name = $request->name;
            $status->update();
            return redirect()->route('status-list')->with('success', 'status updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);

        try {
            $status->deleted_by = Auth::user()->id;
            $status->delete();
            $status->save();

            return redirect()->route('status-list')->with('success', 'status deleted successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
