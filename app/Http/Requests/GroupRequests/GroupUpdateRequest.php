<?php

namespace App\Http\Requests\GroupRequests;

use App\Http\Requests\GroupRequests\GroupRequest;

class GroupUpdateRequest extends GroupRequest
{

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

  //
}
