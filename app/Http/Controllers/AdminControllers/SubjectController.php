<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

use App\Http\Requests\SubjectRequests\{SubjectRequest, SubjectUpdateRequest};
use App\Forms\Subjects\{CreateSubjectForm, UpdateSubjectForm};

use App\Models\Subject;
use App\Tables\Subjects;
use App\Toasts\Notification;

class SubjectController extends Controller
{


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.subjects.index', ['subjects' => Subjects::class]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.subjects.create', [
      'form' => CreateSubjectForm::make(route('admin.subjects.store'))
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SubjectRequest $request)
  {
    if (is_null(
      Subject::create($request->validated())
    )) {
      Notification::warning('No save base');
      return $request->back();
    }

    Notification::siccses('Create new Subject');
    return redirect()->route('admin.subjects.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Subject $subject)
  {
    #
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Subject $subject, Request $request)
  {
    $form = $this->form(
      route('admin.subjects.update', $subject->id),
      'PUT',
      $subject->toArray()
    );

    return view(
      'admin.subjects.edit',
      ['form' => $form]
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(SubjectUpdateRequest $request, Subject $subject)
  {

    $validated = $request->validated();

    $is_update = $subject->update(
      [
        'name' => $validated['name'],
        'discription' => $validated['discription'],
      ]
    );

    if (!$is_update) {
      Toast::title('Whoops!')
        ->warning('No Update Base')
        ->center()
        ->backdrop();
      return $request->back();
    }

    Toast::title('Update Subject ');

    return redirect()->route('admin.subjects.index');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
  }
}
