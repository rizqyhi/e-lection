<?php

namespace App\Repositories;

use App\Candidate;
use App\Repositories\Contracts\CandidateRepository;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class EloquentCandidateRepository implements CandidateRepository
{
    private $model;

    public function __construct(Candidate $candidate) {
        $this->model = $candidate;
    }

    public function save($candidateData) {
        try {
            $candidateData['id'] = Uuid::uuid4()->toString();

            return $this->model->create($candidateData);
        } catch(UnsatisfiedDependencyException $e) {
            throw $e;
        }
    }
}
