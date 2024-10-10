<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Traits\ResponseMessage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUserCreateRequest extends FormRequest
{
    use ResponseMessage;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('users', 'email'),
            ],
            'password' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
