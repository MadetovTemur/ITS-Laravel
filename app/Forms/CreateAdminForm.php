<?php

namespace App\Forms;

use ProtoneMedia\Splade\FormBuilder\{Submit, Radios, Input, Hidden};
use ProtoneMedia\Splade\SpladeForm;


class CreateAdminForm
{


	public static function fields():array
	{
		return [
            
      Input::make('first_name')->label('First Name *')->class('mt-4')
      	->rules(['required', 'max:90'])->maxlength(90),  
      
      Input::make('last_name')->label('Last Name *')->class('mt-4')
        ->rules(['required',  'max:90'])->maxlength(90),
      
      Input::make('sure_name')->label('Sure Name *')->class('mt-4')
        ->rules(['required',  'max:90'])->maxlength(90),
      
      Input::make('username')->label('Username *')->class('mt-4')
      	->prepend('@')
        ->rules(['required', 'min:5', 'max:40'])->maxlength(40),

      Input::make('password')->label('Password *')->class('mt-4')
        ->rules(['required', 'min:8', 'max:24'])->maxlength(24),
      
      Radios::make('jender')->label('Jender *')
      	->options(['Ayol', 'Erkak'])
      	->class('mt-4')->inline()->rules(['required']),

      // Input::make('email')->label('Email')->class('mt-4')->email()
      //       ->rules(['max:255'])->maxlength(255),  

      Input::make('telephone')->label('Telephone')->class('mt-4')
            ->rules(['max:40'])->maxlength(40), 

      Submit::make()
            ->class('mt-4 bg-slate-900 text-white')
            ->label('Save'),
		];
	}

	public static function make(string $url = '', string $method = 'POST', array $data = []): SpladeForm
	{
		return SpladeForm::make()->action($url)->method($method)->fields(self::fields() )
      ->fill($data);
	}
}