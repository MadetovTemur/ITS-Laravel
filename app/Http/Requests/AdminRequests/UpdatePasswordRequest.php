<?php

namespace App\Http\Requests\AdminRequests;

use App\Http\Requests\AdminRequests\AdminRequest;

class UpdatePasswordRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "password" => ['required', 'string', 'min:8', 'max:28', 'confirmed'],
        ];
    }
}
