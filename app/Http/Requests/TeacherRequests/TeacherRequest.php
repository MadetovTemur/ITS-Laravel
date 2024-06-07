<?php

namespace App\Http\Requests\TeacherRequests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  auth()->check();
    }

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
            "username" => ['required', 'string', 'unique:teachers,username', 'min:5', 'max:255'],
            "password" => ['required', 'string', 'min:8', 'max:28'],
            "address" => ['nullable', 'string', 'max:255'],
            "pasport_code" => ['nullable', 'max:60', 'string'],
            "subjects" => ['required', 'array'],
            "subjects.*" => ['integer', 'exists:subjects,id']
        ];
    }

    public function messages(): array
    {
      return [
        '*.required'=> 'Buni toldir majburiy',
        '*.max' => 'Buni malumotni kamaytingiz ',
        '*.min' => 'Ena malumot koishnig ',
        '*.unique' => 'Bunday nom baza mavjud boshgasini kirgazing',
        '*.confirmed' => 'Parol Mos kelmayapdi',
        '*' => 'xxxxxx'
      ];
    }

    // 
}
