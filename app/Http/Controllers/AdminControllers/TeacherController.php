<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Http\Requests\TeacherRequests\{TeacherRequest, UpdateRequest};
use App\Tables\Teachers;
use App\Toasts\Notification;
use App\Forms\{CreateTeacherForm, UpdateTeacherForm, UpdatePasswordTeacher};
use App\Models\{Teacher, TeacherSubjects};

class TeacherController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.teachers.index', ['teachers' => Teachers::class]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $form = CreateTeacherForm::make(route('admin.teachers.store'), 'POST');
    return view('admin.teachers.create', ['form' => $form ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TeacherRequest $request)
  {
    # TODO Db Transaksiya foydalanish kerak
    $validated = $request->validated();
    $validated['uuid'] = (string) Str::uuid();

    $teacher = Teacher::create($validated);

    if(is_null( $teacher )){
      Notification::warning('No Save Base');
      return $request->back();
    }
    
    foreach($validated['subjects'] as $value){
      TeacherSubjects::create(
        [
          'teacher_id' => $teacher->id,
          'subject_id' => $value
        ]
      );
    }

    
    Notification::siccses('Save New Teacher');
    return redirect()->route('admin.teachers.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Teacher $id)
  {
    
  }

  public static function options_data($data)
  {
    $result = [];
    foreach ($data as $value) {
      $result[] = $value['id'];
    }
    return $result;
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $teacher = Teacher::where('id', $id)->first() ?? abort(404); 
    $date =  $teacher->toArray();
    
    $date['subjects'] = $this->options_data(  $teacher->subjects->toArray() );
    
    $form = UpdateTeacherForm::make(
        route('admin.teachers.update', $teacher->id), 
        'PUT', 
        $date
    );

    return view('admin.teachers.edit', [
      'form' => $form,
      'form_update_password' => UpdatePasswordTeacher::make(
          route('admin.teachers.update.password', $teacher->id), 'PUT', class: 'mt-5')
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRequest $request, string $id)
  {

    $validated = $request->validated();
    $teacher = Teacher::where('id', $id)->first() ?? abort(404);
    $teacher->update( $validated );

    dd($validated, $teacher->subjects, 'no save and no update teacher subjects');
  }

  /**
   * Update the password resource in storage.
   */
  public function update_password(UpdatePasswordTeacher $request, string $id)
  {
    $teacher = Teacher::where('id', $id)->first() ?? abort(404);
    
    $password = $teacher->update( 
      [
        'password' => Hash::make( $request->input('password') )
      ]
    );

    if(! $password ){
      Notification::warning('No Save Base');
      return $request->back();
    }

    Notification::siccses('Update Teacher Password');
    return redirect()->route('admin.teachers.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $teacher = Teacher::where('id', $id)->first() ?? abort(404);
    
    $teacher->delete();

    Notification::danger('Teacher succes delete');
    return redirect()->route('admin.teachers.index');
  }
}
