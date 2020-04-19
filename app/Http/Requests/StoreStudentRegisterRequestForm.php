<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin\StudentRegister;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class StoreStudentRegisterRequestForm extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('student_register_no_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
