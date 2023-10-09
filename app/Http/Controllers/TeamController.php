<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.teams', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();
        $leaders = User::all();
        return view('teams.create', ['clubs' => $clubs, 'leaders' => $leaders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'club' => 'required',
            'leader' => 'required',
            'co_leader' => 'required',
            'name' => 'required',
            'level' => 'required',
        ]);

        $team = new Team();
        $team->club_key = $request->club;
        $team->leader_key = $request->leader;
        $team->co_leader_key = $request->co_leader;
        $team->name = $request->name;
        $team->level = $request->level;
        $team->save();

        return redirect()->route('teams')->with('status', 'تم انشاء الفوج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $team = Team::find($request->id);
        if (is_null($team)) {
            return redirect()->route('teams')->with('status', 'لا يوجد هذا الفوج');
        }
        $clubs = Club::all();
        $leaders = User::all();
        return view('teams.edit', compact('team', 'clubs', 'leaders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'club' => 'required',
            'leader' => 'required',
            'co_leader' => 'required',
            'name' => 'required',
            'level' => 'required',
        ]);

        $team = Team::find($request->id);
        $team->club_key = $request->club;
        $team->leader_key = $request->leader;
        $team->co_leader_key = $request->co_leader;
        $team->name = $request->name;
        $team->level = $request->level;
        $team->save();

        return redirect()->route('teams')->with('status', 'تم تعديل الفوج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
