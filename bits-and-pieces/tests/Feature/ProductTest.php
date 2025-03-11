<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Models\Console;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Console $console;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->user = User::where('email', 'rune@yrgo.se')->first();

        $this->console = Console::first();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_view_products_index()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products');
        $response->assertSee('Products');
        $response->assertSee('Manufacturer:');
        $response->assertSee('Platform:');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_view_single_product()
    {
        $this->actingAs($this->user);

        $product = Product::first();

        $response = $this->get(route('products.show', $product));

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertViewHas('product');
        $response->assertSee($product->name);
        $response->assertSee($product->description);
        $response->assertSee($product->color);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_create_new_product()
    {
        $this->actingAs($this->user);

        $productData = [
            'name' => 'Test Controller',
            'console_id' => $this->console->id,
            'description' => 'This is a test controller',
            'color' => 'Purple',
            'connection' => 'wireless',
            'price' => 199.99
        ];

        $response = $this->post(route('products.store'), $productData);

        $response->assertSessionHas('status', 'Product created.');
        $response->assertRedirect();

        $this->assertDatabaseHas('products', [
            'name' => 'Test Controller',
            'description' => 'This is a test controller',
            'color' => 'Purple',
            'connection' => 'wireless'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_update_product()
    {
        $this->actingAs($this->user);

        $product = Product::first();

        $updatedData = [
            'name' => 'Updated Controller',
            'console_id' => $product->console_id,
            'description' => 'This description has been updated',
            'color' => $product->color,
            'connection' => $product->connection,
            'price' => $product->price
        ];

        $response = $this->patch(route('products.update', $product), $updatedData);

        $response->assertSessionHas('status', 'Product updated.');
        $response->assertRedirect();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Controller',
            'description' => 'This description has been updated'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function validation_errors_are_shown_when_creating_product()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('products.store'), [
            'name' => '',
            'console_id' => '',
            'description' => '',
            'color' => '',
            'connection' => '',
            'price' => 'not-a-number'
        ]);

        $response->assertSessionHasErrors(['name', 'console_id', 'color', 'connection', 'price']);
    }
}
