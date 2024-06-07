<?php

namespace App\Http\Requests\GroupRequests;

use App\Http\Requests\GroupRequests\GroupRequest;

class GroupStudentRequest extends GroupRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "students" => ['required', 'array'],
            'students.*' => ['required', 'integer', 'exists:students,id'],
            'start_at' => ['nullable', 'string', 'max:40']
        ];
    }

    //
}
