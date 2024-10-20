<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\Traits\ResponseMessage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostRoleCreateRequest extends FormRequest
{
    use ResponseMessage;

    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        return true;
    }
}
