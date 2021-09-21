<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'rules' => 'required|string|max:255',
        ]);    
                
        $group = Group::create([
            'title' => $request->title,
            'description' => $request->description,
            'rules' => $request->rules
        ]);
        
        return redirect()->route( 'admin.index' )->with('status', 'Group Has Been Created Successfully!');       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
    
    /**
     * Returns a view showing all groups in database
     */
    public function showAllGroups(){
        return view('groups.showAllGroups', [
            'groups' => DB::table('groups')->paginate(10)
        ]);
    }

    /**
     * Handles user search information 
     * Returns a view displaying the group results cards, if any. 
     * View is similar to showAllGroups view
     * 
     * @param Request
     * @return view
     */
    public function search(Request $request){
        $key = trim($request->get('search'));

        $groups = Group::query()
        ->where('id', 'like', "%{$key}%")
        ->orWhere('title', 'like', "%{$key}%")
        ->orWhere('description', 'like', "%{$key}%")
        ->orWhere('rules', 'like', "%{$key}%")
        ->orderBy('id', 'asc')
        ->get();

        return view('groups.showGroupPostings')->with('groups', $groups);
    }
}
