<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info("Inside JobController@index");
        return view('users.jobs.showAllJobs', [
            'jobs' => DB::table('jobs')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info("Inside UserController@create");
        return view('users.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("Inside UserController@store");
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'requirements' => 'required|string|max:255'
        ]);
        
      
        
        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'user_id' => Auth::User()->id
        ]);
        
        event(new Registered($job));
        
        Session::flash('status', 'Job Has Been ');
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route( 'admin.index' )->with('status', 'Job Posting Has Been Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        Log::info("Inside UserController@show");
        $job = Job::find($job);
        return view('users.jobs.showJob')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Handles user search information and passes it to show function for display
     * @param Request $request
     */
    
    public function search(Request $request){
        Log::info("Inside UserController@search");
        $key = trim($request->get('search'));
        
        $jobs = Job::query()
        ->where('id', 'like', "%{$key}%")
        ->orWhere('title', 'like', "%{$key}%")
        ->orWhere('description', 'like', "%{$key}%")
        ->orWhere('requirements', 'like', "%{$key}%")
        ->orderBy('id', 'asc')
        ->get();
              
        return view('users.jobs.showJobPostings')->with('jobs', $jobs);
    }
        
    public function edit($job)
    {
        Log::info("Inside UserController@edit");
        $key = (int)$job;
        
        $job = Job::find($key);
        return view('users.jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $job)
    {
        Log::info("Inside UserController@update");
        $job = Job::findOrFail($job);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'requirements' => 'required|string|max:255'
        ]);
        
        // Fill user model
        $job->fill([
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements
        ]);
        
        // Save Job Posting to database
        $job->save();
        
        return redirect()->route( 'admin.index' )->with('status', 'Job Posting Has Been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($job)
    {
        Log::info("Inside UserController@destroy");
        $job = Job::findOrFail($job);
        $flag = $job->delete();
        
        if($flag == true){
            return redirect()->route( 'admin.index' )->with('status', 'Job Posting Has Been Deleted Successfully!');
        }
        else{
            return redirect()->route( 'admin.index' )->with('status', 'ERROR: Job Posting Has Not Been Deleted Successfully!');
        }
    }
    
    /**
     * Returns a view showing all users in database
     */
    public function showAllJobs(){
        Log::info("Inside UserController@showAllJobs");
        return view('users.jobs.showAllJobs', [
            'jobs' => DB::table('jobs')->paginate(10)
        ]);
    }
}
