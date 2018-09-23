<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'name' => 'required',
            'classroom_id' => 'sometimes|integer',
            'access_code' => 'sometimes|alpha_num'
        ];
    }
}
