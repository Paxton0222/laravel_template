<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Traits\ResponseMessage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PutPermissionUpdateRequest extends FormRequest
{
    use ResponseMessage;

    public function rules(): array
    {
        return [
            'id' => 'required|exists:permissions,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
