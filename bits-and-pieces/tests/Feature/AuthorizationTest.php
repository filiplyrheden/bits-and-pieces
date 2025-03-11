<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private User $regularUser;
    private Product $product;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->admin = User::where('email', 'filip@bitsandpieces.com')->first();
        $this->regularUser = User::where('email', 'rune@yrgo.se')->first();

        $this->product = Product::first();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_delete_products()
    {
        $this->actingAs($this->admin);

        $response = $this->delete(route('products.destroy', $this->product));

        $response->assertSessionHas('status', 'Product deleted.');
        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', [
            'id' => $this->product->id
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function regular_user_cannot_delete_products()
    {
        $this->actingAs($this->regularUser);

        $response = $this->delete(route('products.destroy', $this->product));

        $response->assertSessionHas('error', 'Unauthorized action.');
        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $this->product->id
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function price_field_is_visible_to_admin_in_product_form()
    {
        $this->actingAs($this->admin);

        $response = $this->get(route('products.edit', $this->product));

        $response->assertStatus(200);
        $response->assertSee('Price:');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function price_field_is_hidden_from_regular_user_in_product_form()
    {
        $this->actingAs($this->regularUser);

        $response = $this->get(route('products.create'));

        $response->assertStatus(200);
        $response->assertDontSee('Price:');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_see_delete_button_on_product_page()
    {
        $this->actingAs($this->admin);

        $response = $this->get(route('products.show', $this->product));

        $response->assertStatus(200);
        $response->assertSee('Delete');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function regular_user_cannot_see_delete_button_on_product_page()
    {
        $this->actingAs($this->regularUser);

        $response = $this->get(route('products.show', $this->product));

        $response->assertStatus(200);
        $response->assertDontSee('Delete');
    }
}
