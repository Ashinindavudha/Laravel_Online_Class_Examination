<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRollRequestForm;
use App\Http\Requests\UpdateStudentRollRequestForm;
//use Gate;
use App\Model\Admin\StudentRoll;
//use Symfony\Component\HttpFoundation\Response;

class StudentRollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('roll_no_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student_rolls = StudentRoll::all();

        return view('admin.student_roll.index', compact('student_rolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('roll_no_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student_roll.create');
    }

    
    public function store(StoreStudentRollRequestForm $request)
    {
        $student_roll = StudentRoll::create($request->all());

        return redirect()->route('admin.studentrolls.index');
    }

    
    public function show($id)
    {
         //abort_if(Gate::denies('roll_no_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $student_roll = StudentRoll::find($id);
        return view('admin.student_roll.show', compact('student_roll'));
    }

    
    public function edit($id)
    {
        //abort_if(Gate::denies('roll_no_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $student_roll_edit = StudentRoll::findOrFail($id);
        return view('admin.student_roll.edit', compact('student_roll_edit'));
    }

    
    public function update(Request $request, $id)
    {
        $student_roll_edit = StudentRoll::find($id);
        
        $student_roll_edit->update($request->all());

        return redirect()->route('admin.studentrolls.index');
    }

    
    public function destroy($id)
    {
        //abort_if(Gate::denies('roll_no_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        StudentRoll::where('id', $id)->delete();

        //$student_register_delete->delete();

        return back();  
    }
}
