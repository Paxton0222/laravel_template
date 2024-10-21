<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Traits\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetPermissionEditRequest extends FormRequest
{
    use Page;

    public function rules(): array
    {
        return $this->pageRules();
    }

    public function authorize(): bool
    {
        return true;
    }
}
