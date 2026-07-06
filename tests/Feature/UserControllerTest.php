<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_updating_a_user_with_a_new_profile_image_keeps_the_new_image(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create([
            'profile_image' => 'existing.jpg',
            'role' => 'user',
        ]);

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->actingAs($admin)->put("/user/update/{$user->id}", [
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => '01234567890',
            'address' => $user->address,
            'role' => 'user',
            'status' => 1,
            'profile_image' => $file,
            'remove_image' => '0',
        ]);

        $response->assertRedirect(route('user'));
        $user->refresh();

        $this->assertNotEquals('default.jpg', $user->profile_image);
        $this->assertStringEndsWith('.jpg', $user->profile_image);
        $this->assertFileExists(public_path('images/users/' . $user->profile_image));
    }
}
