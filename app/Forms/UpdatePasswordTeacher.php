<?php

namespace App\Forms;

use ProtoneMedia\Splade\FormBuilder\{Submit, Input};
use ProtoneMedia\Splade\SpladeForm;


class UpdatePasswordTeacher
{


	public static function fields():array
	{
		return [

      Input::make('password')->label('New Password *')->class('mt-4')
        ->rules(['required', 'min:8', 'max:24'])->password()
        ->minlength(8)->maxlength(24),
      
      Input::make('password_confirmation')->label('Confirm New Password *')->class('mt-4')
        ->rules(['required', 'min:8', 'max:24'])->password()
        ->minlength(8)->maxlength(24),

      

      Submit::make()
            ->class('mt-4 bg-slate-900 text-white')
            ->label('Save'),
		];
	}

	public static function make(string $url = '', string $method = 'POST', array $data = [], string $class = ''): SpladeForm
	{
		return SpladeForm::make()->action($url)->method($method)
			->class($class)
			->fields(self::fields())
      ->fill($data);
	}
}