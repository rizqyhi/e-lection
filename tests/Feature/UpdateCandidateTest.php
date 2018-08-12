<?php

namespace Tests\Feature;

use App\Repositories\Contracts\CandidateRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCandidateTest extends TestCase
{
    use RefreshDatabase;

    public $candidate;

    public function setUp()
    {
        $this->candidate = [
            'id'    => '1234-abcd',
            'name'  => 'John Doe',
            'no'    => 1,
            'color' => '#ffff00',
            'photo' => 'avatar.jpg'
        ];

        parent::setUp();
    }

    public function testUpdateCandidatePageExists() {}

    public function testFailedUpdateCandidate() {}

    public function testSuccessfullyUpdateCandidate() {}
}
