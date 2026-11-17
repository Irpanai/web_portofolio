<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageUploadTest extends TestCase
{
    public function test_guest_cannot_upload_image(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test.jpg');

        $response = $this->postJson('/dashboard/upload-image', [
            'image' => $file,
        ]);

        $response->assertUnauthorized();
    }

    public function test_authenticated_user_can_upload_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->make(['id' => 1]);

        $file = UploadedFile::fake()->image('hero.jpg', 600, 600);

        $response = $this->actingAs($user)->postJson('/dashboard/upload-image', [
            'image' => $file,
        ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
            ]);

        $responseData = $response->json();
        $this->assertNotEmpty($responseData['url']);

        $hashName = $file->hashName();
        Storage::disk('public')->assertExists('portfolio/'.$hashName);
    }

    public function test_upload_image_requires_valid_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->make(['id' => 1]);

        $file = UploadedFile::fake()->create('test.pdf', 100, 'application/pdf');

        $response = $this->actingAs($user)->postJson('/dashboard/upload-image', [
            'image' => $file,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['image']);
    }

    public function test_upload_hero_route_also_works(): void
    {
        Storage::fake('public');

        $user = User::factory()->make(['id' => 1]);

        $file = UploadedFile::fake()->image('hero2.jpg', 600, 600);

        $response = $this->actingAs($user)->postJson('/dashboard/upload-hero', [
            'image' => $file,
        ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
            ]);

        $hashName = $file->hashName();
        Storage::disk('public')->assertExists('portfolio/'.$hashName);
    }
}
