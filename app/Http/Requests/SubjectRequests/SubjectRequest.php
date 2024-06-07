<?php

namespace App\Http\Requests\SubjectRequests;

use App\Http\Requests\MainRequest;


class SubjectRequest extends MainRequest
{

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
}
