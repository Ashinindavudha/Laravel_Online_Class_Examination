@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="form-group">
                <label for="subject_id">{{ trans('cruds.question.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id">
                    @foreach($subjects as $id => $subject)
                        <option value="{{ $id }}" {{ old('subject_id') == $id ? 'selected' : '' }}>{{ $subject }}</option>
                    @endforeach
                </select>
                @if($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.subject_helper') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
                <input class="form-control {{ $errors->has('question_text') ? 'is-invalid' : '' }}" type="text" name="question_text" id="question_text" value="{{ old('question_text', '') }}">
                @if($errors->has('question_text'))
                    <span class="text-danger">{{ $errors->first('question_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_text_helper') }}</span>
            </div> -->

             <div class="form-group {{ $errors->has('question_text') ? 'has-error' : '' }}">
                <label for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
                <textarea id="question_text" name="question_text" class="form-control ">{{ old('question_text', isset($registers) ? $registers->question_text : '') }}</textarea>
                @if($errors->has('question_text'))
                    <em class="invalid-feedback">
                        {{ $errors->first('question_text') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.question_text_helper') }}
                </p>
            </div>

            <div class="form-group">
                <label for="option1">{{ trans('cruds.question.fields.option_one') }}</label>
                <input class="form-control {{ $errors->has('option1') ? 'is-invalid' : '' }}" type="text" name="option1" id="option1" value="{{ old('option1', '') }}">
                @if($errors->has('option1'))
                    <span class="text-danger">{{ $errors->first('option1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_one_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="option2">{{ trans('cruds.question.fields.option_two') }}</label>
                <input class="form-control {{ $errors->has('option2') ? 'is-invalid' : '' }}" type="text" name="option2" id="option2" value="{{ old('option2', '') }}">
                @if($errors->has('option1'))
                    <span class="text-danger">{{ $errors->first('option2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_two_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="option3">{{ trans('cruds.question.fields.option_three') }}</label>
                <input class="form-control {{ $errors->has('option3') ? 'is-invalid' : '' }}" type="text" name="option3" id="option3" value="{{ old('option3', '') }}">
                @if($errors->has('option3'))
                    <span class="text-danger">{{ $errors->first('option3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_three_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="option4">{{ trans('cruds.question.fields.option_four') }}</label>
                <input class="form-control {{ $errors->has('option4') ? 'is-invalid' : '' }}" type="text" name="option4" id="option4" value="{{ old('option4', '') }}">
                @if($errors->has('option4'))
                    <span class="text-danger">{{ $errors->first('option4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_four_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="option5">{{ trans('cruds.question.fields.option_five') }}</label>
                <input class="form-control {{ $errors->has('option1') ? 'is-invalid' : '' }}" type="text" name="option5" id="option5" value="{{ old('option5', '') }}">
                @if($errors->has('option5'))
                    <span class="text-danger">{{ $errors->first('option5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.option_five_helper') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="answer_explanation">{{ trans('cruds.question.fields.answer_explanation') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('answer_explanation') ? 'is-invalid' : '' }}" name="answer_explanation" id="answer_explanation">{!! old('answer_explanation') !!}</textarea>
                @if($errors->has('answer_explanation'))
                    <span class="text-danger">{{ $errors->first('answer_explanation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.answer_explanation_helper') }}</span>
            </div> -->

            <div class="form-group {{ $errors->has('answer_explanation') ? 'has-error' : '' }}">
                <label for="answer_explanation">{{ trans('cruds.question.fields.answer_explanation') }}</label>
                <textarea id="answer_explanation" name="answer_explanation" class="form-control ">{{ old('answer_explanation', isset($registers) ? $registers->answer_explanation : '') }}</textarea>
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
                <input class="form-control {{ $errors->has('more_info_link') ? 'is-invalid' : '' }}" type="text" name="more_info_link" id="more_info_link" value="{{ old('more_info_link', '') }}">
                @if($errors->has('more_info_link'))
                    <span class="text-danger">{{ $errors->first('more_info_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.more_info_link_helper') }}</span>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.question.fields.correct') }}</label>
                <select class="form-control {{ $errors->has('correct') ? 'is-invalid' : '' }}" name="correct" id="correct">
                    <option value disabled {{ old('correct', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Model\Admin\Question::CORRECT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('correct', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('correct'))
                    <span class="text-danger">{{ $errors->first('correct') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.correct_helper') }}</span>
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