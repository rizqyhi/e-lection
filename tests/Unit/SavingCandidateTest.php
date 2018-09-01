<?php

namespace Tests\Unit;

use App\Candidate;
use App\Repositories\Contracts\CandidateRepository;
use App\Repositories\EloquentCandidateRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SavingCandidateTest extends TestCase
{
    public function test_failed_saving_candidate()
    {
        $model = $this->prophesize(Candidate::class);
        $repo = new EloquentCandidateRepository($model->reveal());
        $model->create()->shouldBeCalled();

        $candidate = $repo->save([
            'name' => 'John Doe',
            'no'   => 1,
            'color' => '#ffffff',
            'photo' => 'file.jpg'
        ]);

//        var_dump($candidate);

    }
}
