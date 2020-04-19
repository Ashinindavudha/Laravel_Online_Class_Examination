<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin\AcademicYear;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class StoreAcademicYearRequestForm extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('academic_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
