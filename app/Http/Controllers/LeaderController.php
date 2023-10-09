<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaders = User::all()->where('degree', '!=', 0);
        return view('leaders.index', compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leaders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required_with:confirm_password', 'string', 'min:8'],
            'confirm_password' => 'required',
            'job' => 'required',
            'phone' => 'required|numeric|min:10',
        ]);

        $leader = new User();
        $leader->name = $request->name;
        $leader->email = $request->email;
        $leader->password = Hash::make($request->password);
        $leader->degree = 2;
        $leader->job = $request->job;
        $leader->phone = $request->phone;

        $leader->save();

        return redirect()->route('leaders')->with('status', 'تم انشاء القائد بنجاح');
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
        $leader = User::find($id);
        if (is_null($leader) || ($leader->degree == 0)) {
            return redirect()->route('leaders')->with('status', 'لا يوجد هذا القائد');
        }

        return view('leaders.edit', ['leader' => $leader]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $leader = User::find($request->id);
        if (is_null($leader) || ($leader->degree == 0)) {
            return redirect()->route('leaders')->with('status', 'لا يوجد هذا القائد');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => 'same:confirm_password',
            'job' => 'required',
            'phone' => 'required|numeric|min:10',
        ]);

        $leader->name = $request->name;
        if ($request->email != $leader->email) {
            if (User::where('email', '==', $request->email)) {
                return redirect()->back()->with('status', 'رجاء اختيار ايميل اخر');
            }
            $leader->email = $request->email;
        }
        if ($request->password != '') {
            $leader->password = Hash::make($request->password);
        }
        $leader->job = $request->job;
        $leader->phone = $request->phone;

        $leader->save();

        return redirect()->route('leaders')->with('status', 'تم تعديل القائد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
