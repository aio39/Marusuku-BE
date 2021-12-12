<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->getMethod() == 'PUT'){
            return  $this->authorize();
        }
//        $this->route('user')
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'score' => 'min:0|max:5',
            'content' => 'min:0|max:1000',
        ];
    }
}
