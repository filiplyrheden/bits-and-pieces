<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_view_login_form()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
        $response->assertSee('Login');
        $response->assertSee('Email:');
        $response->assertSee('Password:');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_login_with_correct_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'rune@yrgo.se',
            'password' => 'rune'
        ]);

        $response->assertRedirect('/products');
        $response->assertSessionHas('status', 'Logged in successfully!');
        $this->assertAuthenticated();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_cannot_login_with_incorrect_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'rune@yrgo.se',
            'password' => 'wrong-password'
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_is_redirected_to_login_if_not_authenticated()
    {
        $response = $this->get('/products');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_logout()
    {
        $user = User::where('email', 'rune@yrgo.se')->first();
        $this->actingAs($user);
        $this->assertAuthenticated();

        $response = $this->get('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
