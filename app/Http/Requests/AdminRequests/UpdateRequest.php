<?php

namespace App\Http\Requests\AdminRequests;

use App\Http\Requests\AdminRequests\AdminRequest;

class UpdateRequest extends AdminRequest
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
            "username" => ['required', 'string', "unique:admins,name,{$this->id}", 'min:5', 'max:255'],
        ];
    }
}
