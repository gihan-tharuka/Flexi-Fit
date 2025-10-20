<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use function Pest\Laravel\get;


    /**
     * A basic feature test example.
     */
it('shows the login page', function () {
    $response = $this->get('login');
    $response->assertStatus(200);
    $response->assertSee('login');
});

it('logs in a user with correct credentials', function () {
    // Ensure the user exists with the specific email and password

    // Perform login request
    $response = $this->post('/login', [
        'email' => 'admin@admin.com',
        'password' => 'admin',
    ]);
    // Assert that the login attempt was successful
    $response->assertRedirect('/');

    // Assert that the user is authenticated
    $authenticatedUser = auth()->user();
    expect($authenticatedUser);
});



