<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == 'PUT'){
            return [
                'name' => ['required'],
                'type' => ['required', Rule::in(['I', 'B', 'i','b'])],
                'email'=> ['required', 'email'],
                'address'=> ['required'],
                'city'=> ['required'],
                'state'=> ['required'],
                'postal_code'=> ['required'],
            ];
        }else{
            return [
                'name' => ['sometimes','required'],
                'type' => ['sometimes','required', Rule::in(['I', 'B', 'i','b'])],
                'email'=> ['sometimes','required', 'email'],
                'address'=> ['sometimes','required'],
                'city'=> ['sometimes','required'],
                'state'=> ['sometimes','required'],
                'postal_code'=> ['sometimes','required'],
            ];
        }

    }

    protected function prepareForValidation(){
        $this->merge([
            'postal_code' => $this->postalCode,
        ]);
    }
}
