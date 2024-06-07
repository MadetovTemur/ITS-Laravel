<?php

namespace App\Http\Requests\SubjectRequests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'name' => ['required', 'min:4', 'max:255', 'unique:subjects,name', 'string'],
          'discription' => ['nullable', 'min:5', 'max:255', 'string'],
        ];
    }

    public function messages(): array
    {
      return [
        '*.required'=> 'Buni toldir majburiy',
        '*.min' => 'Description minimum length bla bla bla',
        '*.unique' => 'Bunday nom baza mavjud',
      ];
    }

}
