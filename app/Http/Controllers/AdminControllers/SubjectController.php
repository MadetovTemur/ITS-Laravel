<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

use App\Http\Requests\SubjectRequests\{SubjectRequest, SubjectUpdateRequest};
use App\Forms\{CreateSubjectForm, UpdateSubjectForm};
use ProtoneMedia\Splade\FormBuilder\{Submit, Textarea, Input, Hidden};
use ProtoneMedia\Splade\SpladeForm;

use App\Models\Subject;
use App\Tables\Subjects;

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
    return view('admin.subjects.create', ['form' => CreateSubjectForm::class]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SubjectRequest $request)
  {
    $validated = $request->validated();

    $result = Subject::create(
      [
        'name' => $validated['name'],
        'discription' => $validated['discription'],
      ]
    );

    if(is_null($result)){
      Toast::title('Whoops!')
        ->warning('No Save Base')
        ->center()
        ->backdrop();
        return $request->back();
    }
    
    Toast::title('Create new Subject');
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
    $form = $this->form(route('admin.subjects.update', $subject->id), 
                        'PUT',
                        $subject->toArray());
    
    return view('admin.subjects.edit', 
      ['form' => $form]);
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

  private function form(string $url = '', string $method = 'POST', array $data = [])
  {

    $from = SpladeForm::make()->action($url)
      ->method($method)
      ->fields([
          Hidden::make('id'),
            
          Input::make('name')
                ->label('Subject Name')
                ->class('mt-4')
                ->rules(['required', 'min:4', 'max:255']),
            
          Textarea::make('discription')
                ->label('Discription Name')
                ->autosize()
                ->class('mt-4')
                ->rules(['required', 'max:255']),
            //

          Submit::make()
                ->class('mt-4 bg-slate-900 text-white')
                ->label('Save'),
      ])->fill($data);
    return $from;
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {

  }


  
}
