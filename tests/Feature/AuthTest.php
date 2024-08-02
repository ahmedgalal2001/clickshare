<?php
// tests/Feature/AuthTest.php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // $this->artisan('db:seed', ['--class' => 'UserSeeder']);
    }

    public function test_staff_user_can_sign_in()
    {
        $response = $this->post('/login', [
            'email' => 'staff@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home'); // Adjust the redirect URL as needed
        $this->assertAuthenticated();
    }

    public function test_non_staff_user_can_sign_in()
    {
        $response = $this->post('/login', [
            'email' => 'nonstaff@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home'); // Adjust the redirect URL as needed
        $this->assertAuthenticated();
    }

    public function test_admin_user_can_sign_in()
    {
        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home'); // Adjust the redirect URL as needed
        $this->assertAuthenticated();
    }

    public function test_manager_user_can_sign_in()
    {
        $response = $this->post('/login', [
            'email' => 'manager@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home'); // Adjust the redirect URL as needed
        $this->assertAuthenticated();
    }
}
