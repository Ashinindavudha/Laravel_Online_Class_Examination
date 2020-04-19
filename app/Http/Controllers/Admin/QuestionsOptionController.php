<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\QuestionsOption;

class QuestionsOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        //abort_if(Gate::denies('question_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $questions_options = QuestionsOption::all();

        return view('admin.questions_options.index', compact('questions_options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort_if(Gate::denies('question_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $relations = [
            'questions' => \App\Model\Admin\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('admin.questions_options.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         QuestionsOption::create($request->all());

        return redirect()->route('admin.question-options.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //abort_if(Gate::denies('question_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $relations = [
            'questions' => \App\Model\Admin\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = QuestionsOption::findOrFail($id);

        return view('admin.questions_options.show', compact('questions_option') + $relations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //abort_if(Gate::denies('question_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $relations = [
            'questions' => \App\Model\Admin\Question::get()->pluck('question_text', 'id')
        ];

        $questionOption = QuestionsOption::findOrFail($id);

        return view('admin.questions_options.edit', compact('questionOption') + $relations);
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
        $questionOption = QuestionsOption::findOrFail($id);
        $questionOption->update($request->all());

        return redirect()->route('admin.question-options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //abort_if(Gate::denies('question_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('admin.question-options.index');
    }

}
