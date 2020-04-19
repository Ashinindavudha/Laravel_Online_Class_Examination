@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.show') }} {{ trans('cruds.question.title') }}
        </h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.id') }}
                        </th>
                        <td>
                            {{ $question->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.subject') }}
                        </th>
                        <td>
                            {{ $question->subject->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.question_text') }}
                        </th>
                        <td>
                            {!! htmlspecialchars_decode($question->question_text) !!}
                            
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.answer_explanation') }}
                        </th>
                        <td>
                            {!! htmlspecialchars_decode($question->answer_explanation) !!}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.question.fields.more_info_link') }}
                        </th>
                        <td>
                            {{ $question->more_info_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
