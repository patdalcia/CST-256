<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDemographic extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'gender',
        'age',
        'education',
        'interests',
        'country',
        'user_id'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * checks if the user belongs to a particular group
     * @param string|array $role
     * @return bool
     */
    // public function role($role) {
    //     $role = (array)$role;
    //     if($this->admin > 0){
    //         $r = "admin";
    //     }
    //     else{
    //         $r = "member";
    //     }
    //     return in_array($r, $role);
    // }
    
    
    /**
     * Get the user that owns the demographic.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
