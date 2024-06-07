<?php

namespace App\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\SpladeForm;

class LoginUserForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('auth.login'))
            ->method('POST')
            ->fill([
                //
            ]);
    }

    public function fields(): array
    {
        return [
            Input::make('username')
                ->label('Username')
                ->rules(['required', 'min:5', 'max:255']),
            
            Input::make('password')
                ->label('Password')
                ->rules(['required', 'min:8', 'max:255']),
            //

            Submit::make()
                ->class('mt-5')
                ->label('Login In'),
        ];
    }
}
