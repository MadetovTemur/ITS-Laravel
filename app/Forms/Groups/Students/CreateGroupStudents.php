<?php

namespace App\Forms\Groups\Students;


use ProtoneMedia\Splade\FormBuilder\{Submit, Radios, Input, Select, Date};
use ProtoneMedia\Splade\SpladeForm;

use App\Models\{Student, GroupStudents};

class CreateGroupStudents
{
	public static function options_data()
	{
		$result = [];
		$groupStudents = GroupStudents::all()->pluck("id")->toArray();

		foreach (Student::all() as $item) {
			if (!in_array($item->id, $groupStudents))
				$result[$item->id] = $item->full_name();
		}
		return $result;
	}

	public static function fields(): array
	{
		return [

			Select::make('students[]')->label('Group Students')->class('mt-4')
				->options(
					self::options_data()
				)->multiple(),

			Date::make('start_at')->label('Start At (defoult date `now`)')->class('mt-4')
				->rules(['required']),

			Submit::make()
				->class('mt-4 mb-3 bg-slate-900 text-white')
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
