<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_product()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('products.store'), [
            'name' => 'Teste Produto',
            'description' => 'Descrição',
            'quantity' => 5,
            'price' => 9.99,
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Teste Produto']);
    }

    public function test_authenticated_user_can_update_product()
    {
        $user = User::factory()->create();
        $product = Product::create([
            'name' => 'Old', 'description' => '', 'quantity' => 1, 'price' => 1.0
        ]);

        $response = $this->actingAs($user)->put(route('products.update', $product), [
            'name' => 'Updated',
            'description' => 'New',
            'quantity' => 2,
            'price' => 2.50,
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Updated']);
    }

    public function test_authenticated_user_can_delete_product()
    {
        $user = User::factory()->create();
        $product = Product::create([
            'name' => 'ToDelete', 'description' => '', 'quantity' => 1, 'price' => 1.0
        ]);

        $response = $this->actingAs($user)->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['name' => 'ToDelete']);
    }

    public function test_authenticated_user_can_view_products_index()
    {
        $user = User::factory()->create();
        Product::create(['name' => 'P1', 'description' => '', 'quantity' => 1, 'price' => 1.0]);

        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertSee('P1');
    }
}
