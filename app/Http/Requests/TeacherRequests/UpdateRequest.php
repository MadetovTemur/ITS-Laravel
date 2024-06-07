<?php

namespace App\Http\Requests\TeacherRequests;

use App\Http\Requests\TeacherRequests\TeacherRequest;


class UpdateRequest extends TeacherRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => ['required', 'max:90', 'string'],
            "last_name" => ['required', 'max:90', 'string'],
            "sure_name" => ['required', 'max:90', 'string'],
            "jender" => ['required', 'integer'],
            "telephone" => ['nullable', 'max:40'],
            "date_birth" => ['required'],
            "username" => ['required', 'string', "unique:teachers,username,{$this->id}", 'min:5', 'max:255'],
            "address" => ['nullable', 'string', 'max:255'],
            "pasport_code" => ['nullable', 'max:60', 'string'],
            "subjects" => ['required', 'array'],
            "subjects.*" => ['integer', 'exists:subjects,id']
        ];
    }

   

    // 
}
