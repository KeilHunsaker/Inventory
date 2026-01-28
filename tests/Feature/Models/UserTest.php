<?php

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can be created', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'role' => UserRole::Admin,
    ]);

    expect($user->name)->toBe('John Doe');
    expect($user->email)->toBe('john@example.com');
    expect($user->role)->toBe(UserRole::Admin);
});

test('user initials method returns correct initials', function () {
    $user = new User(['name' => 'John Doe']);
    expect($user->initials())->toBe('JD');

    $user2 = new User(['name' => 'Jane Smith']);
    expect($user2->initials())->toBe('JS');

    $user3 = new User(['name' => 'Single']);
    expect($user3->initials())->toBe('S');
});

test('user role helper methods work correctly', function () {
    $admin = User::factory()->create(['role' => UserRole::Admin]);
    $manager = User::factory()->create(['role' => UserRole::Manager]);
    $user = User::factory()->create(['role' => UserRole::User]);

    expect($admin->isAdmin())->toBeTrue();
    expect($admin->isManager())->toBeFalse();

    expect($manager->isManager())->toBeTrue();
    expect($manager->isAdmin())->toBeFalse();

    expect($user->isAdmin())->toBeFalse();
    expect($user->isManager())->toBeFalse();
});
