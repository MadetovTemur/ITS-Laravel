<?php


namespace App\Http\Requests\StudentRequests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
		      "first_name" => ['required', 'max:90', 'string'],
		      "last_name" => ['required', 'max:90', 'string'],
		      "sure_name" => ['required', 'max:90', 'string'],
		      "date_birth" => ['required'],
		      "jender" => ['required', 'integer'],
		      "telephone" => ['nullable', 'max:40'],
          "pasport_code" => ['nullable', 'max:60', 'string'],
		      "address" => ['nullable', 'max:255', 'string'],
          "subjects" => ['required']
        ];
    }

    public function messages(): array
    {
      return [
        '*.required'=> 'Buni toldir majburiy',
        '*.max' => 'Buni malumotni kamaytingiz ',
        '*.min' => 'Ena malumot koishnig ',
        '*.unique' => 'Bunday nom baza mavjud boshgasini kirgazing',
      ];
    }

}
