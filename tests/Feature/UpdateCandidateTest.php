<?php

namespace Tests\Feature;

use App\Candidate;
use App\Repositories\Contracts\CandidateRepository;
use App\Repositories\EloquentCandidateRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCandidateTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdateCandidatePageExists() {
        $candidateRepo = new EloquentCandidateRepository(new Candidate());
        $candidate = $candidateRepo->save([
            'name'  => 'John Doe',
            'no'    => 1,
            'color' => '#ffff00',
            'photo' => 'avatar.jpg'
        ]);

        $response = $this->get('/dashboard/candidates/'.$candidate->id);

        $response->assertStatus(201);
    }

    public function testFailedUpdateCandidate() {
        $candidateRepo = new EloquentCandidateRepository(new Candidate());
        $candidate = $candidateRepo->save([
            'name'  => 'John Doe',
            'no'    => 1,
            'color' => '#ffff00',
            'photo' => 'avatar.jpg'
        ]);

        $response = $this->put('/dashboard/candidates/'.$candidate->id, [
            'name' => 'John saja'
        ]);

        $response->assertStatus(200);
    }

    public function testSuccessfullyUpdateCandidate() {}
}
