<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'names' => 'required',
            'surnames' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'cedula' => 'required|unique:patients,cedula,'.$this->route('patient')->id,
            'tipo_sangre' => 'required',
            'cel' => 'required',
            'email' => 'required',
            'addres' => 'required',
        ];
    }
}
