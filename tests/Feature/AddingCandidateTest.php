<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AddingCandidateTest extends TestCase
{
    use RefreshDatabase;

    public function testAddingCandidatePageExists() {
        $response = $this->get('/dashboard/candidates/create');

        $response->assertStatus(200);
    }

    public function testFailedAddingCandidate() {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $candidate = [
            'no'    => 1,
            'color' => '#ffff00',
            'photo' => $file
        ];

        $response = $this->json('post', '/dashboard/candidates', $candidate);
        $response->assertStatus(422);

        $this->assertDatabaseMissing('candidates', $candidate);
        Storage::disk('public')->assertMissing($file->hashName());
    }

    public function testSuccessfullyAddingCandidate() {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $candidate = [
            'name'  => 'John Doe',
            'no'    => 1,
            'color' => '#ffff00',
            'photo' => $file
        ];

        $response = $this->json('post', '/dashboard/candidates', $candidate);
        $response->assertStatus(201);

        $this->assertDatabasehas('candidates', $candidate);
        Storage::disk('public')->assertExists('candidates/'.$file->hashName());
    }
}
