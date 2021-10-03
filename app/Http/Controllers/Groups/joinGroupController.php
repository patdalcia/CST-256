<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\JoinedGroups;

class joinGroupController extends Controller
{
    public function join($group){
        Log::info("Inside JoinGroupController@join");
        $joinedGroup = JoinedGroups::create([
            'user_id' => Auth::user()->id,
            'group_id' => $group
        ]);
        return redirect()->route( 'dashboard' )->with('status', 'Group Has Been Joined Successfully!');
    }
}
