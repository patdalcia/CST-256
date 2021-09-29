<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Group;

class RestController extends Controller
{
    /**
     * API endpoint that returns all jobs in DB, paginated with 100 results per page
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllJobs(Request $request){
        try
        {
            $jobs = DB::table('jobs')->paginate(100);
        }
        catch(ModelNotFoundException $e){
            return response()->json([
                'status code' => '400',
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status code' => '200',
            'message' => 'Desired resource has been found, results are paginated with result limit of 100 results per page',
            'data' => $jobs,
        ]);
    }
    /**
     * 
     * API endpoint that returns selected job based on ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJob($id){
        try
        {
            $job = Job::findorfail($id);
        }
        catch (ModelNotFoundException $e){
            return response()->json([
               'status code' => '400',
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status code' => '200',
            'message' => 'Desired resource has been found',
            'data' => $job,
        ]);
    }
    /**
     * API endpoint that returns all users in DB, paginated with 100 results per page
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUsers(Request $request){
        try 
        {
            $users = DB::table('users')->paginate(100);
        }
        catch (ModelNotFoundException $e){
            return response()->json([
                'status code' => '400',
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status code' => '200',
            'message' => 'Desired resource has been found, results are paginated with result limit of 100 results per page',
            'data' => $users,
        ]);
    }
    /**
     * API endpoint that returns desired user based on id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser($id){
        try
        {
            $user = User::findorfail($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json([
                'status code' => '400',
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status code' => '200',
            'message' => 'Desired resource has been found',
            'data' => $user,
        ]);
    }
    /**
     * API endpoint that returns all groups in DB, paginated with 100 results per page
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllGroups(Request $request){
        try 
        {
            $groups = DB::table('groups')->paginate(100);
        }
        catch(ModelNotFoundException $e){
            return response()->json([
                'status code' => '400',
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status code' => '200',
            'message' => 'Desired resource has been found, results are paginated with result limit of 100 results per page',
            'data' => $groups,
        ]);
    }
    /**
     * API endpoint that returns desired group based on id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGroup($id){
        try 
        {
            $group = Group::findorfail($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json([
                'status code' => '400',
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status code' => '200',
            'message' => 'Desired resource has been found',
            'data' => $group,
        ]);
    }
}
