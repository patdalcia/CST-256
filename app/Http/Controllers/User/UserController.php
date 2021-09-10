<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Models\UserDemographic;
use App\Models\UserPortfolio;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.userPortal.portal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.userPortal.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $demographics = User::find($id)->userDemographic;
        $portfolio = User::find($id)->userPortfolio;

        if(is_null($demographics)){
            $demographics = new \stdClass();
            $demographics->gender = " ";
            $demographics->age = " ";
            $demographics->education = " ";
            $demographics->interests = " ";
            $demographics->country = " ";
        }


        // attempting to chain with(), if this doesn't work then refactor 
        // compact() to pass several vars as an array
        return view('users.userPortal.edit')->with('user', $user)
            ->with('demographics', $demographics)
            ->with('portfolio', $portfolio);
        // return view('users.userPortal.edit')->with('user', $user)->with('demographics', $demographics);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $demographics = User::findOrFail($id)->userDemographic;
        $portfolio = User::findOrFail($id)->userPortfolio;

        
        
        $request->validate([
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'string|max:255',
            'age' => 'required|integer',
            'education' => 'required|string|max:100',
            'interests' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            // TODO: add validation rules to portfolio fields
        ]);
        
        // Fill user model
        $user->fill([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        if(is_null($demographics)){
            // Fill demographics model
            $demographics = new UserDemographic();
            $demographics->user_id = $user->id;
            $demographics->gender = $request->gender;
            $demographics->age = $request->age;
            $demographics->education = $request->education;
            $demographics->interests = $request->interests;
            $demographics->country = $request->country;
        }
        else{
            // Fill demographics model
            $demographics->fill([
                'gender' => $request->gender,
                'age' => $request->age,
                'education' => $request->education,
                'interests' => $request->interests,
                'country' => $request->country,
            ]);
        }        
        
        if(is_null($portfolio)){
            // Fill portfolio model
            $portfolio = new UserPortfolio();
            $portfolio->user_id = $user->id;
            $portfolio->job = $request->job;
            $portfolio->skills = $request->skills;
            $portfolio->professionaleducation = $request->professionaleducation;
        } 
        else {
            // Fill portfolio model from page
            $portfolio->fill([
                'job' => $request->job,
                'skills' => $request->skills,
                'professionaleducation' => $request->professionaleducation,
            ]);
        }

        // Save user to database
        $user->save();
        
        // Save demographics to database
        $demographics->save();

        // Save portfolio to database
        $portfolio->save();
        
        return redirect()->route( 'user.index' )->with('status', 'Your information Has Been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function showAllPosts(){
        echo "HERE";
    }
}
