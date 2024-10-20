<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\Traits\ResponseMessage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PutRoleUpdateRequest extends FormRequest
{
    use ResponseMessage;

    public function rules(): array
    {
        return [
            'id' => 'required|exists:roles,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
