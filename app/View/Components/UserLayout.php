<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserLayout extends Component
{

    public array $adminNav = [
        [
            'title' => 'Subjects',
            'name' => 'admin.subjects.index'
        ],
        [
            'title' => 'Students',
            'name' => 'admin.students.index'
        ],
        [
            'title' => 'Admins',
            'name' => 'admin.admins.index'
        ],
        [
            'title' => 'Teachers',
            'name' =>  'admin.teachers.index'
        ],
        [
            'title' => 'Groups',
            'name' => 'admin.groups.index'
        ],
    ];




    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-layout');
    }
}
