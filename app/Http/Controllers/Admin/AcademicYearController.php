<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAcademicYearRequestForm;
use App\Http\Requests\UpdateAcademicYearRequestForm;
use Gate;
use App\Model\Admin\AcademicYear;
use Symfony\Component\HttpFoundation\Response;
class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('academic_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_years = AcademicYear::all();

        return view('admin.academic_year.index', compact('academic_years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //abort_if(Gate::denies('academic_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       return view('admin.academic_year.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $academic_year = AcademicYear::create($request->all());

        return redirect()->route('admin.academicyears.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //abort_if(Gate::denies('academic_year_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $academic_show = AcademicYear::find($id);
       return view('admin.academic_year.show', compact('academic_show'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //abort_if(Gate::denies('academic_year_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $academic = AcademicYear::findOrFail($id);
        return view('admin.academic_year.edit', compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $academic = AcademicYear::find($id);

       $academic->update($request->all());

       return redirect()->route('admin.academicyears.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //abort_if(Gate::denies('academic_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       AcademicYear::where('id', $id)->delete();
       return back();
    }
}
