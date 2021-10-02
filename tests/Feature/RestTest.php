<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Group;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestTest extends TestCase
{
    public function test_return_all_jobs()
    {
        $job = Job::factory(3)->make();

        $response = $this->get('api/job', [$job]);

        $response->assertStatus(200);
    }

    public function test_return_a_specific_job(){
        $job = Job::factory()->make([
            'title' => "developer"
        ]);

        $response = $this->get('api/job/developer', [$job]);

        $response->assertStatus(200);
    }
    
    public function test_return_all_users(){

        $users = User::factory(5)->make();

        $response = $this->get('api/user', [$users]);

        $response->assertStatus(200);
    }
    
    public function test_return_a_specific_user(){
        $user = User::factory()->make([
            'id' => 4
        ]);

        $response = $this->get('api/user/4', [$user]);

        $response->assertStatus(200);
    }

    public function test_return_all_groups(){
        $group = Group::factory(8)->make();

        $response = $this->get('api/group', [$group]);
        
        $response->assertStatus(200);
    }

    public function test_return_a_specific_group(){
        $group = Group::factory()->make([
            'title' => "linux"
        ]);

        $response = $this->get('api/group/linux', [$group]);

        $response->assertStatus(200);
    }
}
