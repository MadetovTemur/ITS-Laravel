<?php 

namespace App\Http\Requests\StudentRequests;


use App\Http\Requests\StudentRequests\StudentRequest;

class StudentUpdateRequest extends StudentRequest {
	

	public function rules(): array
  {
    return [
      "first_name" => ['required', 'max:90', 'string'],
      "last_name" => ['required', 'max:90', 'string'],
      "sure_name" => ['required', 'max:90', 'string'],
      "date_birth" => ['required'],
      "jender" => ['required', 'integer'],
      "email" => ['nullable', 'email', 'max:255', 'string'],
      "telephone" => ['nullable', 'max:40'],
      "pasport_code" => ['nullable', 'max:60', 'string'],
      "address" => ['nullable', 'max:255', 'string'],
    ];
  }
}