<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddingCandidateTest extends TestCase
{
    use RefreshDatabase;

    public function testAddingCandidatePageExists() {
        $response = $this->get('/dashboard/candidates/create');

        $response->assertStatus(200);
    }

    public function testFailedAddingCandidate() {
        $candidate = [
            'no'    => 1,
            'color' => '#ffff00'
        ];

        $response = $this->json('post', '/dashboard/candidates', $candidate);
        $response->assertStatus(422);

        $this->assertDatabaseMissing('candidates', $candidate);
    }

    public function testSuccessfullyAddingCandidate() {
        $candidate = [
            'name'  => 'John Doe',
            'no'    => 1,
            'color' => '#ffff00'
        ];

        $response = $this->json('post', '/dashboard/candidates', $candidate);
        $response->assertStatus(201);

        $this->assertDatabasehas('candidates', $candidate);
    }
}
