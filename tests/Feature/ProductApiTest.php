<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_products_index()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(401); // 401 means Unauthorized
    }

    public function test_guests_cannot_view_a_product()
    {
        $response = $this->get('/api/products/1');

        $response->assertStatus(401);
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
        $response = $this->put('/api/products/1', [
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