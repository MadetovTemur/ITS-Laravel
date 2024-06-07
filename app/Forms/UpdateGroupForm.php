<?php 

namespace App\Forms;


use ProtoneMedia\Splade\FormBuilder\{Submit, Radios, Input, Select, Date};
use ProtoneMedia\Splade\SpladeForm;

use App\Models\{Teacher, Subject};

class UpdateGroupForm 
{
	public static function options_data()
	{
		$result = [];
		foreach (Teacher::all()->toArray() as $value) {
			$result[$value['id']] = $value['first_name'] . " " . $value['last_name'];
		}
		return $result;
	}

	public static function options_data_2()
	{
		$result = [];
		foreach (Subject::all()->toArray() as $value) {
			$result[$value['id']] = $value['name'];
		}
		return $result;	
	}

	public static function fields():array
	{
		return [
		            
		      Input::make('name')->label('Group Name *')->class('mt-4')
		      	->rules(['required', 'max:90'])->maxlength(40),  
		      
		      Input::make('discription')->label('Discription *')->class('mt-4')
		            ->rules(['max:40'])->maxlength(255),   
		     	
		     	Date::make('start_at')->label('Start At ')->class('mt-4')
                    ->rules(['required']), 

		      Radios::make('status')->label('Status *')
		      	->options(['Active', 'Complite', 'No Startup', 'Success Complite'])
		      	->class('mt-4')->rules(['required']),

		      Select::make('teacher_id')->label('Group Teacher')->class('mt-4')
		      			->options(
		      				self::options_data()
		      			),
		   		Select::make('subject_id')->label('Group Subjec')->class('mt-4')
		      			->options(
		      				self::options_data_2()
		      			),
		      
		      Submit::make()
		            ->class('mt-4 bg-slate-900 text-white')
		            ->label('Save'),
		];
	}

	public static function make(string $url = '', string $method = 'POST', array $data = []): SpladeForm
	{
		return SpladeForm::make()->action($url)->method($method)->fields(
			self::fields() 
		)->fill($data);
	}
}