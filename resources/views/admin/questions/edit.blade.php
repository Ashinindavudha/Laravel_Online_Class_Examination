@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
       <form action="{{ route('admin.questions.update', [$question->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="form-group">
                <label for="subject_id">{{ trans('cruds.question.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id">
                    @foreach($subjects as $id => $subject)
                        <option value="{{ $id }}" {{ (isset($question) && $question->student ? $question->subject->id : old('subject_id')) == $id ? 'selected' : '' }}>{{ $subject }}</option>
                    @endforeach
                </select>
                @if($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.subject_helper') }}</span>
            </div>
            

             <div class="form-group {{ $errors->has('question_text') ? 'has-error' : '' }}">
                <label for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
                <textarea id="question_text" name="question_text" class="form-control ">{{ old('question_text', isset($question) ? $question->question_text : '') }}</textarea>
                @if($errors->has('question_text'))
                    <em class="invalid-feedback">
                        {{ $errors->first('question_text') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.question_text_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('answer_explanation') ? 'has-error' : '' }}">
                <label for="answer_explanation">{{ trans('cruds.question.fields.answer_explanation') }}</label>
                <textarea id="answer_explanation" name="answer_explanation" class="form-control ">{{ old('answer_explanation', isset($question) ? $question->answer_explanation : '') }}</textarea>
                @if($errors->has('answer_explanation'))
                    <em class="invalid-feedback">
                        {{ $errors->first('answer_explanation') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.answer_explanation_helper') }}
                </p>
            </div>

            <div class="form-group">
                <label for="more_info_link">{{ trans('cruds.question.fields.more_info_link') }}</label>
                <input class="form-control {{ $errors->has('more_info_link') ? 'is-invalid' : '' }}" type="text" name="more_info_link" id="more_info_link" value="{{ old('more_info_link', isset($question) ? $question->more_info_link : '') }}">
                @if($errors->has('more_info_link'))
                    <span class="text-danger">{{ $errors->first('more_info_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.more_info_link_helper') }}</span>
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
  $(function () {
    CKEDITOR.replace('answer_explanation');
    $(".textarea").wysihtml5();
});
</script>
<script>
  $(function () {
    CKEDITOR.replace('question_text');
    $(".textarea").wysihtml5();
});
</script>
@stop