<?php

namespace App\Policies;

use App\Models\Subject;
use App\Models\Admin;

class SubjectPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(Subject $subject, Admin $admin)
    {
      
    }

}
