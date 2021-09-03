<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.admin');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        event(new Registered($user));
        
        Session::flash('status', 'User Has Been ');
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route( 'admin.index' )->with('status', 'User Has Been Created Successfully!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  User  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($users)
    {
        return view('users.showUsers')->with('users', $users);
    }
    
    /**
     * Handles user search information and passes it to show function for display
     * @param Request $request
     */
    
    public function search(Request $request){
        
        $key = trim($request->get('search'));
        
        $users = User::query()
        ->where('id', 'like', "%{$key}%")
        ->orWhere('username', 'like', "%{$key}%")
        ->orWhere('firstname', 'like', "%{$key}%")
        ->orWhere('lastname', 'like', "%{$key}%")
        ->orWhere('email', 'like', "%{$key}%")
        ->orderBy('id', 'asc')
        ->get();
        
        
        return view('users.showUsers')->with('users', $users);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $key = (int)$id;
        
        $user = User::find($key);
        return view('users.edit')->with('user', $user);
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
        
        $request->validate([
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // Fill user model
        $user->fill([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        // Save user to database
        $user->save();
        
        return redirect()->route( 'admin.index' )->with('status', 'User Has Been Updated Successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $flag = $user->delete();
        
        if($flag == true){
            return redirect()->route( 'admin.index' )->with('status', 'User Has Been Deleted Successfully!');
        }
        else{
            return redirect()->route( 'admin.index' )->with('status', 'ERROR: User Has Not Been Deleted Successfully!');
        }
    }
    
    /**
     * Returns a view showing all users in database
     */
    public function showAllUsers(){
        return view('users.showAllUsers', [
            'users' => DB::table('users')->paginate(10)
        ]);
    }
    
    
    
}
