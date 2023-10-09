<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaders = User::all();
        return view('clubs.create', ['leaders' => $leaders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'leader_key' => 'required',
            'name' => 'required|string',
        ]);

        $club = new Club();
        $club->leader_key = $request->leader_key;
        $club->name = $request->name;

        $club->save();
        return redirect()->route('clubs')->with('status', 'تم انشاء النادي بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $club = Club::find($id);
        $leaders = User::all();
        if (is_null($club)) {
            return redirect()->route('clubs')->with('status', 'لا يوجد هذا النادي');
        }

        return view('clubs.edit', ['club' => $club, 'leaders' => $leaders]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $club = Club::find($request->id);
        if (is_null($club)) {
            return redirect()->route('clubs')->with('status', 'لا يوجد هذا النادي');
        }

        $club->leader_key = $request->leader_key;
        $club->name = $request->name;

        $club->save();
        return redirect()->route('clubs')->with('status', 'تم تعديل النادي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        //
    }
}
