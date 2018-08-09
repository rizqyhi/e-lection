<?php

namespace App\Repositories;

use App\Candidate;
use App\Repositories\Contracts\CandidateRepository;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class EloquentCandidateRepository implements CandidateRepository
{
    private $candidate;

    public function __construct(Candidate $candidate) {
        $this->candidate = $candidate;
    }

    public function save($candidateData) {
        try {
            $candidateData['id'] = Uuid::uuid4()->toString();

            return $this->candidate->create($candidateData);
        } catch(UnsatisfiedDependencyException $e) {
            throw $e;
        }
    }
}
