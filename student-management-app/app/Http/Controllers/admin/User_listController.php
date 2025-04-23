<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class User_listController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {

        $search = $request->input('search');

        $user_searchs = User::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->get();

        $positions = Position::with('users')->get();
        $statuss = Status::with('users')->get();
        $users = User::all();
        return view('admin.users.index', compact('users', 'positions', 'statuss', 'search', 'user_searchs'));
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
    public function store(string $id) {}

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
        $rows = User::findOrFail($id);
        // $positions = User::distinct()->pluck('position');
        // $positions = Position::all();
        $positions = Position::with('users')->get();
        $statuss = Status::with('users')->get();
        return view('admin.users.update', compact('rows', 'positions', 'statuss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rows = User::findOrFail($id);

        // dd($rows->id);

        $rows->update([

            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'status_id' => $request->status,
            'position_id' => $request->position,
            // dd($request->status),


            'updated_by' => Auth::user()->id,
            // dd(Auth::user()->id)

        ]);

        return redirect()->route('user-list')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $rows = User::findOrFail($id);

        $rows->delete();
        $rows->deleted_by = Auth::user()->id;
        $rows->save();


        return redirect()->route('user-list')->with('success', 'User deleted successfully.');
    }
}
