@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.edit') }} {{ trans('cruds.questionOption.title_singular') }}
        </h4>
    </div>

   <div class="card-body">
        <form method="POST" action="{{ route('admin.question-options.update', [$questionOption->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="question_id">{{ trans('cruds.questionOption.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id">
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ ($questionOption->question ? $questionOption->question->id : old('question_id')) == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.questionOption.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="option">{{ trans('cruds.questionOption.fields.option') }}</label>
                <input class="form-control {{ $errors->has('option') ? 'is-invalid' : '' }}" type="text" name="option" id="option" value="{{ old('option', $questionOption->option) }}">
                @if($errors->has('option'))
                    <span class="text-danger">{{ $errors->first('option') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.questionOption.fields.option_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('correct') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="correct" value="0">
                    <input class="form-control" type="checkbox" name="correct" id="correct" value="1" {{ $questionOption->correct || old('correct', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="correct">{{ trans('cruds.questionOption.fields.correct') }}</label>
                </div>
                @if($errors->has('correct'))
                    <span class="text-danger">{{ $errors->first('correct') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.questionOption.fields.correct_helper') }}</span>
            </div>         <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
<!-- @section('scripts')

<script>
  $(function () {
    CKEDITOR.replace('description');
    $(".textarea").wysihtml5();
});
</script>
@stop -->