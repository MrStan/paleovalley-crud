<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_products_index()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(401); // Expecting a 401 Unauthorized response
    }

    public function test_guests_cannot_view_a_product()
    {
        $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->id);

        $response = $this->get('/api/products/1');

        $response->assertStatus(401);
    }

    public function test_authenticated_users_can_access_products_index()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }
    public function test_guests_cannot_create_a_product()
    {
        $response = $this->post('/api/products', [
            'name' => 'New Product',
            'description' => 'New Product Description',
            'price' => 100
        ]);

        $response->assertStatus(401);
    }

    public function test_guests_cannot_update_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->put('/api/products/' . $product->id, [
            'name' => 'Updated Product'
        ]);

        $response->assertStatus(401);
    }

    public function test_guests_cannot_delete_a_product()
    {
        $response = $this->delete('/api/products/1');

        $response->assertStatus(401);
    }

}