<?php

namespace App\Http\Requests\SubjectRequests;


// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\SubjectRequests\SubjectRequest;


class SubjectUpdateRequest extends SubjectRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'id' => ['required', 'integer'],
          'name' => ['required', 'min:4', 'max:255', "unique:subjects,name,{$this->id}", 'string'],
          'discription' => ['nullable', 'min:5', 'max:255', 'string'],
        ];
    }


}
