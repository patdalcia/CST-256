<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{


    public function test_admin_dashboard_hidden_for_reguluar_user(){
        $user = User::factory()->make();

        $view = $this->post('/dashboard', [$user]);

        $view->assertSee("Normal User Permissions");
    }

    public function test_admin_dashboard_displays_for_administrator()
    {
        $admin = User::factory()->make([
            'admin' => 1
        ]);

        $view = $this->post('/dashboard', [$admin]);

        $view->assertSee("Admin Permissions");
    }

}
