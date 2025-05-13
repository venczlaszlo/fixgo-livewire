<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_profile()
    {
        $this->get('/profile')->assertRedirect('/login');
    }

    public function test_logged_in_users_can_access_profile()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/profile')
            ->assertStatus(200);
    }
}
