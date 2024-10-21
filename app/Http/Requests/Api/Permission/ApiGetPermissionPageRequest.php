<?php

namespace App\Http\Requests\Api\Permission;

use App\Http\Requests\Traits\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;

class ApiGetPermissionPageRequest extends FormRequest
{
    use ApiResponse;

    public function rules(): array
    {
        return $this->pageRules();
    }

    public function authorize(): bool
    {
        return true;
    }
}
