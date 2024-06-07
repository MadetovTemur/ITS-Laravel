<?php

namespace App\Http\Requests\GroupRequests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
      "name" => ['required', 'max:40', 'string'],
      "discription" => ['required', 'max:255', 'string'],
      "start_at" => ['required', 'max:90', 'string'],
      "status" => ['required', 'integer'],
      "teacher_id" => ['required', 'integer', 'exists:teachers,id'],
      "subject_id" => ['required', 'integer', 'exists:subjects,id'],
    ];
  }

  public function messages(): array
  {
    return [
      '*.required' => 'Buni toldir majburiy',
      '*.max' => 'Buni malumotni kamaytingiz ',
      '*.min' => 'Ena malumot koishnig ',
      '*.unique' => 'Bunday nom baza mavjud boshgasini kirgazing',
      '*.confirmed' => 'Parol Mos kelmayapdi',
      '*.exists' => 'Mavjud bolmagan raqam'
    ];
  }

  //
}
