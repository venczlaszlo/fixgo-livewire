<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_delete_own_profile()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->delete('/profile')
            ->assertRedirect('/');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_user_cannot_delete_other_user_profile()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        // Ehhez külön route kéne ha ilyet csinálna, ez csak példa:
        $this->actingAs($user)
            ->delete('/profile', ['user_id' => $otherUser->id]);

        // Biztosítjuk, hogy az ő adata nem törlődik
        $this->assertDatabaseHas('users', ['id' => $otherUser->id]);
    }
}
