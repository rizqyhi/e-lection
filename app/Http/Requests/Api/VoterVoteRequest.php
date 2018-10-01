<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Voter;

class VoterVoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $voter = Voter::find($this->voter_id);

        return !$voter->vote;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'voter_id'     => 'required|integer',
            'candidate_id' => 'required|alpha_dash'
        ];
    }
}
