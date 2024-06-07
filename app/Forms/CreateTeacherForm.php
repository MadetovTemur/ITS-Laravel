<?php 

namespace App\Forms;

use ProtoneMedia\Splade\FormBuilder\{Submit, Radios, Input, Select, Hidden, Date};
use ProtoneMedia\Splade\SpladeForm;
use App\Models\Subject;

class CreateTeacherForm
{
	public static function options_data()
	{
		$result = [];
		foreach (Subject::all()->toArray() as $key => $value) {
			$result[$value['id']] = $value['name'];
		}
		return $result;
	}

	public static function fields():array
	{
		return [
      Hidden::make('id'),  
       
      Input::make('first_name')->label('First Name *')->class('mt-4')
      	->rules(['required', 'max:90'])->maxlength(90),  
      
      Input::make('last_name')->label('Last Name *')->class('mt-4')
        ->rules(['required',  'max:90'])->maxlength(90),
      
      Input::make('sure_name')->label('Sure Name *')->class('mt-4')
        ->rules(['required',  'max:90'])->maxlength(90),
      
      Date::make('date_birth')->label('Date Birth *')->class('mt-4')
                    ->rules(['required']), 

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

      Input::make('address')->label('Address')->class('mt-4')
                        ->rules(['max:40'])->maxlength(40),  
      Input::make('pasport_code')->label('Passport code')->class('mt-4')
                        ->rules(['max:60'])->maxlength(60),   

      Select::make('subjects[]')->label('Subjects')->class('mt-4')
      			->options(
      				self::options_data()
      			)->multiple(),

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