<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddingCandidateTest extends TestCase
{
    public function testAddingCandidatePageExists() {
        $response = $this->get('/dashboard/candidates/create');

        $response->assertStatus(200);
    }

    public function testFailedAddingCandidate() {}

    public function testSuccessfullyAddingCandidate() {}
}
