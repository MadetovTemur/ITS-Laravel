<?php

namespace App\Forms\Groups\Students;


use ProtoneMedia\Splade\FormBuilder\{Submit, Radios, Input, Select, Date};
use ProtoneMedia\Splade\SpladeForm;


use App\Models\{Student, GroupStudents};
use App\Enums\StudentStatus;

class EditGroupStudents
{

    public static function fields(): array
    {
        return [

            Select::make('status')->label('Group Students')->class('mt-4')
                ->options(
                    collect(StudentStatus::cases())->pluck("name","value")->toArray()
                ),

            Date::make('start_at')->label('Start At (defoult date `now`)')->class('mt-4')
                ->rules(['required']),

            Date::make('finish_at')->label('Finish At ')->class('mt-4')
                ->rules(['required']),

            Submit::make()
                ->class('mt-4 mb-3 bg-slate-900 text-white')
                ->label('Save'),
        ];
    }

    public static function make(string $url = '', string $method = 'POST', array $data = []): SpladeForm
    {
        // dd($data);
        return SpladeForm::make()->action($url)->method($method)->fields(
            self::fields()
        )->fill($data);

    }
}
