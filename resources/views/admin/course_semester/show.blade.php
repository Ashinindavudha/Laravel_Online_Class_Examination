@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.show') }} {{ trans('cruds.course_semester.title') }}
        </h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course_semester.fields.id') }}
                        </th>
                        <td>
                            {{ $course_semester_show->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course_semester.fields.name') }}
                        </th>
                        <td>
                            {{ $course_semester_show->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course_semester.fields.desc') }}
                        </th>
                        <td>
                            {!! htmlspecialchars_decode($course_semester_show->description) !!}
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
