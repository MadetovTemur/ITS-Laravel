<?php

namespace App\Tables;

use App\Models\Subject;
use App\Toasts\Notification;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;




class Subjects extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {

        // use Illuminate\Support\Facades\Cache;
        // $r = Cache::get('subjects', function () {
        //     $cache = Subject::all();
        //     Cache::put('subjects', $cache, now()->addMinute(5));
        //     return $cache;
        // });
        // dd($r);
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
        return Subject::query();
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
            ->withGlobalSearch(columns: ['id', 'name'])
            ->column('id', sortable: true, searchable: true)
            ->column('name', sortable: true, searchable: true)
            ->column('actions', exportAs: false)
            ->bulkAction(
                label: 'Delete Selected Subjects',
                each: fn (Subject $subject) => $subject->delete(),
                confirm: 'Are you sure you want to delete the selected subjects?',
                confirmButton: 'Delete',
                cancelButton: 'Cancel',
                requirePassword: true,
                after: fn () => Notification::info('Subjecta deleted successfully!'),
            )
            ->rowLink(fn (Subject $subject) => route('admin.subjects.show', $subject->id))
            ->paginate(20);
    }
}
