<?php

namespace App\Forms\Subjects;


use ProtoneMedia\Splade\FormBuilder\{Submit, Input, Textarea};
use ProtoneMedia\Splade\SpladeForm;


class CreateSubjectForm
{

    public static function fields(): array
    {
        return [
            Input::make('name')->label('Subject name *')->class('mt-4')
                ->minlength(4)->maxlength(255),

            Textarea::make('discription')->label('Discription'),

            Submit::make()
                ->class('mt-4 bg-slate-900 text-white')
                ->label('Save'),
        ];
    }

    public static function make(string $url = '', string $method = 'POST', array $data = []): SpladeForm
    {
        return SpladeForm::make()->action($url)->method($method)
            ->fields(self::fields())
            ->fill($data);
    }
}
