<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin\CourseSemester;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class UpdateCourseSemesterRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //abort_if(Gate::denies('semester_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];

    }
}
