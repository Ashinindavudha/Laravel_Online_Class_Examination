<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseSemesterRequestForm;
use App\Http\Requests\UpdateCourseSemesterRequestForm;
use Gate;
use App\Model\Admin\CourseSemester;
use Symfony\Component\HttpFoundation\Response;
class CourseSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('semester_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_semesters = CourseSemester::all();

        return view('admin.course_semester.index', compact('course_semesters'));
    }

    
    public function create()
    {
        //abort_if(Gate::denies('semester_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course_semester.create');
    }

   
    public function store(StoreCourseSemesterRequestForm $request)
    {
        $course_semester = CourseSemester::create($request->all());

        return redirect()->route('admin.coursesemesters.index');
    }

    
    public function show($id)
    {
     //abort_if(Gate::denies('semester_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
     $course_semester_show = CourseSemester::find($id);
     return view('admin.course_semester.show', compact('course_semester_show'));
 }

    
    public function edit($id)
    {
        //abort_if(Gate::denies('semester_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course_semester_edit = CourseSemester::findOrFail($id);
        return view('admin.course_semester.edit', compact('course_semester_edit'));
    }

   
    public function update(Request $request, $id)
    {
       $course_semester_edit = CourseSemester::find($id);

       $course_semester_edit->update($request->all());

       return redirect()->route('admin.coursesemesters.index');
   }

    
    public function destroy($id)
    {
       //abort_if(Gate::denies('semester_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       CourseSemester::where('id', $id)->delete();
       return back();
   }

}
