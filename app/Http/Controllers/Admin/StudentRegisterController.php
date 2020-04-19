<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRegisterRequestForm;
use App\Http\Requests\UpdateStudentRegisterRequestForm;
//use Gate;
use App\Model\Admin\StudentRegister;
//use Symfony\Component\HttpFoundation\Response;
class StudentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('student_register_no_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student_registers = StudentRegister::all();

        return view('admin.student_register_no.index', compact('student_registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('student_register_no_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student_register_no.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRegisterRequestForm $request)
    {
        $student_register = StudentRegister::create($request->all());

        return redirect()->route('admin.studentregisters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //abort_if(Gate::denies('student_register_no_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $student_register_no = StudentRegister::find($id);
        return view('admin.student_register_no.show', compact('student_register_no'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //abort_if(Gate::denies('student_register_no_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $student_register_edit = StudentRegister::findOrFail($id);
        return view('admin.student_register_no.edit', compact('student_register_edit'));
    }

    
    public function update(Request $request, $id )
    {
        $student_register_edit = StudentRegister::find($id);
        
        $student_register_edit->update($request->all());

        return redirect()->route('admin.studentregisters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //abort_if(Gate::denies('student_register_no_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        StudentRegister::where('id', $id)->delete();

        //$student_register_delete->delete();

        return back();  
    }
}
