<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\User;
use App\Model\Admin\AcademicYear;
use App\Model\Admin\CourseSemester;

use App\Model\Admin\StudentRegister;

use App\Model\Admin\StudentRoll;

use App\Model\Admin\Role;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Http\Controllers\Traits\InteractsWithMedia;

class UserController extends Controller
{
    use InteractsWithMedia;
    
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    
    public function create()
    {
        // $relations = [
        //     'roles' => App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        // ];
        $roles = Role::all()->pluck('title', 'id')->prepend('Please select', '');
        $course_semesters = CourseSemester::all()->pluck('name', 'id')->prepend('Please select', '');
        $student_registers = StudentRegister::all()->pluck('name', 'id')->prepend('Please select', '');
        $student_rolls = StudentRoll::all()->pluck('name', 'id')->prepend('Please select', '');
        $academic_years = AcademicYear::all()->pluck('name', 'id')->prepend('Please select', '');
        //dd($academic_years);
        return view('admin.users.create', compact(['roles', 'course_semesters', 'student_registers', 'student_rolls', 'academic_years']));
    }

    
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        if ($request->input('photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }
        return redirect()->route('admin.users.index');
    }


    
    public function edit($id)
    {
        // $relations = [
        //     'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        // ];

        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('title', 'id');
        $course_semesters = CourseSemester::all()->pluck('name', 'id');
        $student_registers = StudentRegister::all()->pluck('name', 'id');
        $student_rolls = StudentRoll::all()->pluck('name', 'id');
        $academic_years = AcademicYear::all()->pluck('name', 'id');
        //dd($academic_years);
        return view('admin.users.edit', compact(['roles', 'course_semesters', 'student_registers', 'student_rolls', 'academic_years', 'user']));
    }

    
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($request->input('photo', false)) {
            if (!$user->photo || $request->input('photo') !== $user->photo->file_name) {
                $user->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
        }
        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        // $relations = [
        //     'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        // ];

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

}
