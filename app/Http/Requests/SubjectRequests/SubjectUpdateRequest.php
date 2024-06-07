<?php

namespace App\Http\Requests\SubjectRequests;

use App\Http\Requests\MainRequest;


class SubjectUpdateRequest extends MainRequest
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

  // 
}
