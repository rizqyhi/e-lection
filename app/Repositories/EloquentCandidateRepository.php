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

    /**
     * method for redefining candidate
     * 
     * @param Candidate
     */
    public function __construct(Candidate $candidate) {
        $this->model = $candidate;
    }

    /**
     * get all with order by number column
     */
    public function getAll()
    {
        return $this->model->newQuery()->orderBy('no')->get();
    }

    /**
     * finding related id
     * 
     * @param int
     * @return array
     */
    public function find($id)
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * method for save candidate
     * 
     * @param array
     * @return void
     */
    public function save($candidateData) {
        /**
         * try append id of candidateData with uuid
         * if error throw UnsatisfiedDependencyException
         */
        try {
            $candidateData['id'] = Uuid::uuid4()->toString();

            return $this->model->create($candidateData);
        } catch(UnsatisfiedDependencyException $e) {
            throw $e;
        }
    }

    /**
     * method for update candidate
     * 
     * @param int,array
     * @return void
     */
    public function update($candidate_id, $candidate_data)
    {
        return $this->model
            ->where('id', $candidate_id)
            ->update($candidate_data);
    }

    /**
     * method for delete candidate
     * 
     * @param int
     * @return void
     */
    public function delete($candidate_id)
    {
        return $this->model
            ->where('id', $candidate_id)
            ->delete();
    }
}
