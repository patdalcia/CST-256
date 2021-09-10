<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    use HasFactory;

    /**
     * E-Portfolio that contains a User's job history, skills, and education
     */

    /**
     * The attributes are mass assignable
     * 
     * @var string[]
     */
    protected $fillable = [
        'job',
        'skills', //perhaps refactor this to be a series of tags
        'professionaleducation',
        'user_id'
    ];

    /**
     * The attributes used for record keeping / business logic
     * The most recent record (biggest number) should be displayed first
     * When user updates record, $revision++;
     * 
     * DB "updated_at" column may be more useful - how best to store the history?
     * @var int
     */
    protected $revisionCount = 1;

    /**
     * Get the user that owns the demographic.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
