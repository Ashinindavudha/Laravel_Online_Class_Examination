@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.show') }} {{ trans('cruds.academic_year.title') }}
        </h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.academic_year.fields.id') }}
                        </th>
                        <td>
                            {{ $academic_show->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academic_year.fields.name') }}
                        </th>
                        <td>
                            {{ $academic_show->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academic_year.fields.desc') }}
                        </th>
                        <td>
                            {!! htmlspecialchars_decode($academic_show->description) !!}
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
