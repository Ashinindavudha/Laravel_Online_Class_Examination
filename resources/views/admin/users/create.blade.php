@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                <p class="help-block">
                    {{ $errors->first('email') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                <p class="help-block">
                    {{ $errors->first('password') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
                <label for="role_id">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="role_id" id="role_id" class="form-control select2">
                        @foreach($roles as $id => $roles)
                        <option value="{{ $id }}">{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('role_id'))
                    <p class="help-block">
                        {{ $errors->first('role_id') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.roles_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('student_register_id') ? 'has-error' : '' }}">
                <label for="student_register_id">{{ trans('cruds.user.fields.student_reg') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="student_register_id" id="student_register_id" class="form-control select2">
                        @foreach($student_registers as $id => $student_register)
                        <option value="{{ $id }}">{{ $student_register }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('student_register_id'))
                    <p class="help-block">
                        {{ $errors->first('student_register_id') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.student_reg_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('student_roll_id') ? 'has-error' : '' }}">
                <label for="student_roll_id">{{ trans('cruds.user.fields.student_roll') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="student_roll_id" id="student_roll_id" class="form-control select2">
                        @foreach($student_rolls as $id => $student_roll)
                        <option value="{{ $id }}">{{ $student_roll }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('student_roll_id'))
                    <p class="help-block">
                        {{ $errors->first('student_roll_id') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.student_roll_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('course_semester_id') ? 'has-error' : '' }}">
                <label for="course_semester_id">{{ trans('cruds.user.fields.course_semester') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="course_semester_id" id="course_semester_id" class="form-control select2">
                        @foreach($course_semesters as $id => $course_semester)
                        <option value="{{ $id }}">{{ $course_semester }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_semester_id'))
                    <p class="help-block">
                        {{ $errors->first('course_semester_id') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.course_semester_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }}">
                <label for="academic_year_id">{{ trans('cruds.user.fields.academic_year') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="academic_year_id" id="academic_year_id" class="form-control select2">
                        @foreach($academic_years as $id => $academic_year)
                        <option value="{{ $id }}">{{ $academic_year }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('academic_year_id'))
                    <p class="help-block">
                        {{ $errors->first('academic_year_id') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.academic_year_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                    <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                    <div class="needsclick dropzone" id="photo-dropzone">

                    </div>
                    @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.photo_helper') }}
                    </p>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  params: {
      size: 2,
      width: 4096,
      height: 4096
  },
  success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
  },
  removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
    }
},
init: function () {
    @if(isset($book) && $book->photo)
    var file = {!! json_encode($book->photo) !!}
    this.options.addedfile.call(this, file)
    this.options.thumbnail.call(this, file, '{{ $book->photo->getUrl('thumb') }}')
    file.previewElement.classList.add('dz-complete')
    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
    this.options.maxFiles = this.options.maxFiles - 1
    @endif
},
error: function (file, response) {
    if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop