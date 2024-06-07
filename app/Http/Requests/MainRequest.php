<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest {

    /**
    * Determine if the user is authorized to make this request.
    */

    public function authorize(): bool
	{
        return  auth()->check();
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