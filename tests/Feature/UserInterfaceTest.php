<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserInterfaceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard_displays_when_user_navigates()
    {
        $user = User::factory()->create();
        $view = $this->post('/dashboard', [$user]);
        
        $view->assertSee('Home Page');

    }

    public function test_dashboard_displays_user_affinity_groups(){
        $user = User::factory()->create();
        $group = Group::factory()->create();

        $view = $this->post('/dashboard', [$user, $group]);
        
        $view->assertSee("mean"); // keyword in test group rules

    }
}
