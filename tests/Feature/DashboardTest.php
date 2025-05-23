<?php

declare(strict_types=1);

use App\Models\User;

test('guests are redirected to the login page', function (): void {
    $response = $this->get('/admin/dashboard');
    $response->assertRedirect('/admin/login');
});

test('authenticated users can visit the dashboard', function (): void {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/admin/dashboard');
    $response->assertStatus(200);
});
