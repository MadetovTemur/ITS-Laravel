<?php

namespace App\Tables;

use App\Models\Group;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\{AbstractTable, SpladeTable};


class Groups extends AbstractTable
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
        return Group::query();
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
            ->column('name', sortable: true, searchable: true)
            // ->column('last_name', sortable: true, searchable: true)
            // ->column('sure_name', sortable: true, searchable: true)
            // ->column('username', sortable: true, searchable: true, hidden: true)
            // ->column('telephone', sortable: true, searchable: true, hidden: true)
            ->column('actions', exportAs: false)
            // ->rowLink(fn (Admin $admin) => route('admin.admins.show', $admin->id))
            ->paginate(30);
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
