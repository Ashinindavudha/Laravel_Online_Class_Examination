<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin\Subject;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubjectRequestForm extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
        ];

    }
}
