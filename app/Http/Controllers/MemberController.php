<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Team;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('members.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_key' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'parent_name' => 'required|string',
            'level_study' => 'required|string',
            'phone' => 'required|numeric|min:10',
        ]);

        $member = new Member();
        $member->team_key = $request->team_key;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->parent_name = $request->parent_name;
        $member->level_study = $request->level_study;
        $member->phone = $request->phone;

        $member->save();
        return redirect()->route('members.create')->with('status', 'تم تسجيل الطالب بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $teams = Team::all();
        if (is_null($member)) {
            return redirect()->route('members')->with('status', 'لا يوجد هذا الطالب');
        }

        return view('members.edit', ['member' => $member, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'team_key' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'parent_name' => 'required|string',
            'level_study' => 'required|string',
            'phone' => 'required|numeric|min:10',
        ]);

        $member = Member::find($request->id);
        if (is_null($member)) {
            return redirect()->route('members')->with('status', 'لا يوجد هذا الطالب');
        }

        $member->team_key = $request->team_key;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->parent_name = $request->parent_name;
        $member->level_study = $request->level_study;
        $member->phone = $request->phone;

        $member->save();
        return redirect()->route('members')->with('status', 'تم تعديل الطالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
