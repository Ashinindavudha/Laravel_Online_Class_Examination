@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.show') }} {{ trans('cruds.questionOption.title') }}
        </h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.id') }}
                        </th>
                        <td>
                            {{ $questions_option->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.question') }}
                        </th>
                        <td>
                             {!! htmlspecialchars_decode($questions_option->question->question_text) !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.option') }}
                        </th>
                        <td>
                            {{ $questions_option->option }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionOption.fields.correct') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $questions_option->correct ? 'checked' : '' }}>
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
