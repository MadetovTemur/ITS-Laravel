<?php

// GET|HEAD        admin/groups/{group}/students ............................................... admin.groups.students.index › AdminControllers\GroupStundetController@index  
// POST            admin/groups/{group}/students ............................................... admin.groups.students.store › AdminControllers\GroupStundetController@store  
// GET|HEAD        admin/groups/{group}/students/create ...................................... admin.groups.students.create › AdminControllers\GroupStundetController@create  
// GET|HEAD        admin/groups/{group}/students/{student} ....................................... admin.groups.students.show › AdminControllers\GroupStundetController@show  
// PUT|PATCH       admin/groups/{group}/students/{student} ................................... admin.groups.students.update › AdminControllers\GroupStundetController@update  
// DELETE          admin/groups/{group}/students/{student} ................................. admin.groups.students.destroy › AdminControllers\GroupStundetController@destroy  
// GET|HEAD        admin/groups/{group}/students/{student}/edit .................................. admin.groups.students.edit › AdminControllers\GroupStundetController@edit 


namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Group, GroupStudents};

use App\Http\Requests\GroupRequests\GroupStudentRequest;
use App\Toasts\Notification;

use App\Enums\StudentStatus;
use App\Forms\Groups\Students\{CreateGroupStudents, EditGroupStudents};

class GroupStundetController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  public function index(Group $group)
  {
    return view('admin.groups.students.index', [
      'groupStudents' => \App\Tables\GroupStudents::class
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Group $group)
  {
    return view(
      'admin.groups.edit',
      [
        'form' => CreateGroupStudents::make(route('admin.groups.students.store', $group->id), 'POST')
      ]
    );
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(GroupStudentRequest $request, Group $group)
  {

    foreach ($request->validated('students') as $id) {
      GroupStudents::create([
        'group_id' => $group->id,
        'student_id' => $id,
        'start_at' => $request->validated('start_at'),
      ]);
    }

    Notification::siccses('Add Student');
    return redirect()->route('admin.groups.students.index', $group->id);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Group $group, GroupStudents $groupStudents)
  {
    dd($groupStudents, $group);
    return view('admin.groups.students.create', [
      'form' => EditGroupStudents::make(route('admin.groups.students.update', [$group->id, $groupStudents->id])),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }


}
