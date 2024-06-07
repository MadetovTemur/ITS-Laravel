<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use  App\Tables\Admins;
use App\Models\Admin;
use App\Toasts\Notification;
use App\Forms\{CreateAdminForm, UpdateAdminForm, UpdatePasswordAdminForm};
use App\Http\Requests\AdminRequests\{AdminRequest, UpdatePasswordRequest, UpdateRequest};

class AdminController extends Controller
{
  //

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.admins.index', ['admin' => Admins::class]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $form = CreateAdminForm::make(route('admin.admins.store'), 'POST');
    return view('admin.admins.create', ['form' => $form ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AdminRequest $request)
  {
    $validated = $request->validated();
    $validated['uuid'] = (string) Str::uuid();
    $validated['password'] = Hash::make( $validated['password'] );


    if(is_null( Admin::create($validated) )){
      Notification::warning('No Save Base');
      return redirect()->back();    
    }
    
    Notification::siccses('Save New Student');
    return redirect()->route('admin.admins.index');
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
  public function edit(Admin $admin)
  {

    $form = UpdateAdminForm::make(route('admin.admins.update', $admin->id), 'PUT', $admin->toArray());
    $form1 = UpdatePasswordAdminForm::make(route('admin.admins.update.password', $admin->id), 'PUT', class: 'mt-5'); 
    return view('admin.admins.edit', ['form' =>  $form, 
                'form_update_password' => $form1]);
  }

  public function update_password(UpdatePasswordRequest $request, Admin $admin)
  {
  
    if(! $admin->update( ['password' => Hash::make( $request->input('password') )])   ){
      Notification::warning('No Save Base');
      return redirect()->back();    
    }

    Notification::siccses('Update Your Password');
    return redirect()->route('admin.admins.index');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRequest $request, Admin $admin)
  {
    if(! $admin->update($request->validated())){
      Notification::warning('No Save Base');
      return redirect()->back();    }

    Notification::siccses('Update Your Data');
    return redirect()->route('admin.admins.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Admin $admin)
  {
    dD(__FUNCTION__);
  }
}
