<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Tables\Groups;
use App\Models\Group;
use App\Toasts\Notification;
use App\Forms\{CreateGroupForm, UpdateGroupForm, CreateGroupStudents};
use App\Http\Requests\GroupRequests\{GroupRequest, GroupUpdateRequest, GroupStudentRequest};

class GroupController extends Controller
{
  //

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.groups.index', ['groups' => Groups::class]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $form = CreateGroupForm::make(route('admin.groups.store'), 'POST');
    return view('admin.groups.create', ['form' => $form ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(GroupRequest $request)
  {
    $validated = $request->validated();
    $validated['uuid'] = (string) Str::uuid();

    if(is_null( Group::create($validated) )){
      Notification::warning('No Save Base');
      return redirect()->back();
    }

    Notification::siccses('Save New Student');
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    dd('show');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Group $group)
  {
    return view('admin.groups.edit',
      [
        'form' => UpdateGroupForm::make(route('admin.groups.update', $group->id), 'PUT', $group->toArray()),
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(GroupUpdateRequest $request, Group $group)
  {
    $group->update( $request->validated() );
    Notification::siccses('Success update Group');
    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Group $group)
  {
    $group->delete();
    Notification::siccses('Success delete Group');
    return redirect()->back();
  }
}
