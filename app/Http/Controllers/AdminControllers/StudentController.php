<?php
 //  GET|HEAD   / admin/students ..................|... admin.students.index › AdminControllers\StudentController@index
 //  POST       / admin/students .................|.... admin.students.store › AdminControllers\StudentController@store
 //  GET|HEAD   / admin/students/create ..........|.. admin.students.create › AdminControllers\StudentController@create
 //  GET|HEAD   / admin/students/{student} .......|...... admin.students.show › AdminControllers\StudentController@show
 //  PUT|PATCH  / admin/students/{student} .......|.. admin.students.update › AdminControllers\StudentController@update
 //  DELETE     / admin/students/{student} .......| admin.students.destroy › AdminControllers\StudentController@destroy
 //  GET|HEAD   / admin/students/{student}/edit ..|...... admin.students.edit › AdminControllers\StudentController@edit


namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

use App\Http\Requests\StudentRequests\{StudentRequest, StudentUpdateRequest};
use App\Toasts\Notification;
use App\Models\Student;
use App\Tables\Students;

use App\Forms\CreateStudentForm;

class StudentController extends Controller
{
  // Cache::put('students', ['te', 'de', 'de'], now()->addMinute(9)) put data
  // Cache::has('students')
    /** now()->addHours(2)
     * Display a listing of the resource.
     */
    public function index()
    {
      // $d = Cache::get('teachers', function () {
      //   $student = Student::all();
      //   Cache::put('teachers', $student, now()->addMinute(10));
      //   return $student;
      // });
      
      // dd($d);
      return view("admin.students.index", ['students' => Students::class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = CreateStudentForm::make(route('admin.students.store'), 'POST');
        return view('admin.students.create', ['form' =>  $form]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();
        $validated['uuid'] = (string) Str::uuid();

        $result = Student::create($validated);

        if(is_null($result)){
            Notification::warning('No Save Base');
            return $request->back();
        }
    
        Notification::siccses('Save New Student');
        return redirect()->route('admin.students.index');
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
    public function edit(Student $student)
    {
        $form = CreateStudentForm::make(route('admin.students.update', $student->id), 'PUT', $student->toArray());
        return view('admin.students.edit', ['form' =>  $form]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {

        $result = $student->update( $request->validated() );


        if(!$result) {
            Notification::warning('No Save Base');
            return $request->back();
        }

        Notification::siccses('Save New Student');
        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $result = $student->delete();

        Notification::danger('Student succes delete');
        return redirect()->route('admin.students.index');
    }


}
