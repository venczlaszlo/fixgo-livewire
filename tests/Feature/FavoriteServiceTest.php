<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FavoriteServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_favorite_a_service()
    {
        $user = User::factory()->create();
        $service = Service::factory()->create();

        $this->withoutMiddleware([\Illuminate\Auth\Middleware\Authenticate::class])
            ->actingAs($user) // Bejelentkezett felhasználó
            ->post(route('services.toggleFavorite', $service)) // Szolgáltatás kedvelése
            ->assertStatus(302); // 302-as válasz várt

        $this->assertDatabaseHas('favorite_services', [
            'user_id' => $user->id,
            'service_id' => $service->id,
        ]);
    }

    public function test_user_can_unfavorite_service()
    {
        $user = User::factory()->create();
        $service = Service::factory()->create();

        // Először kedveljük a szolgáltatást
        $this->actingAs($user)->post(route('services.toggleFavorite', $service));

        // Majd eltávolítjuk a kedvencek közül
        $this->actingAs($user)->post(route('services.toggleFavorite', $service));

        // Ellenőrizzük, hogy az adatbázisban már nem szerepel a rekord
        $this->assertDatabaseMissing('favorite_services', [
            'user_id' => $user->id,
            'service_id' => $service->id,
        ]);
    }
}
