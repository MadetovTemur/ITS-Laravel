<?php

namespace App\Http\Requests\TeacherRequests;

use App\Http\Requests\TeacherRequests\TeacherRequest;

class UpdatePasswordRequest extends TeacherRequest
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
