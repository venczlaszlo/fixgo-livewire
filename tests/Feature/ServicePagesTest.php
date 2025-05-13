<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServicePagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_category_pages_work()
    {
        $routes = [
            '/alkatreszkereskedo',
            '/autoszerelo',
            '/automoso',
            '/gumiszerviz',
            '/automentok',
        ];

        foreach ($routes as $route) {
            $this->get($route)->assertStatus(200);
        }
    }

    public function test_service_detail_page_works()
    {
        $service = Service::factory()->create([
            'slug' => 'teszt-szerviz',
        ]);

        $this->get('/services/' . $service->slug)
            ->assertStatus(200)
            ->assertSee($service->name);
    }
}
