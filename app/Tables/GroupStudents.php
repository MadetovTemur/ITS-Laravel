<?php

namespace App\Tables;
use Illuminate\Support\Facades\Route;

use App\Models\{Group, Student};
use Illuminate\Http\Request;
use ProtoneMedia\Splade\{AbstractTable, SpladeTable};


class GroupStudents extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return auth()->check();
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        // dd(\App\Models\GroupStudents::query()->where('group_id', Route::current()->parameters['group']['id'])->get());
        return 
        \App\Models\GroupStudents::query()->where('group_id', Route::current()->parameters['group']['id']);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id'])
            ->column('id', sortable: true)
            ->column('student_id', label:'Full Name', sortable: true, searchable: true, 
                as: fn(int $id) => Student::where('id', $id)->first()->full_name() )
            ->column('start_at', sortable: true,   as: fn($date) => \Carbon\Carbon::parse($date)->format('j F, Y'))
            ->column('status', sortable: true, searchable: true, 
                as: fn($status) => $status->name )
            ->column('finish_at', sortable: true,  hidden: true, 
                as: fn($date) => ($date == null) ? '' :\Carbon\Carbon::parse($date)->format('j F, Y') )
            ->column('actions', exportAs: false)
            ->paginate(30);
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()
                    // ->rowLink(fn (Admin $admin) => route('admin.admins.show', $admin->id))
            // ->bulkAction()
            // ->export()
    }
}
