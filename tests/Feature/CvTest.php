<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CvTest extends TestCase
{
    public function test_can_view_cv_inline(): void
    {
        $response = $this->get('/cv');

        $response->assertOk();
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertStringContainsString('inline', (string) $response->headers->get('Content-Disposition'));
    }

    public function test_can_download_cv(): void
    {
        $response = $this->get('/download-cv');

        $response->assertOk();
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertStringContainsString('attachment', (string) $response->headers->get('Content-Disposition'));
    }

    public function test_guest_cannot_upload_cv(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('my_cv.pdf', 200, 'application/pdf');

        $response = $this->postJson('/dashboard/upload-cv', [
            'cv' => $file,
        ]);

        $response->assertUnauthorized();
    }

    public function test_authenticated_user_can_upload_cv(): void
    {
        Storage::fake('public');

        $user = User::factory()->make(['id' => 1]);

        $file = UploadedFile::fake()->create('updated_cv.pdf', 300, 'application/pdf');

        $response = $this->actingAs($user)->postJson('/dashboard/upload-cv', [
            'cv' => $file,
        ]);

        $response->assertOk()
            ->assertJson([
                'success' => true,
            ]);

        Storage::disk('public')->assertExists('cv/cv-muhammad-irfan-akbar.pdf');
    }
}
