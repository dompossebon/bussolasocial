<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'start' => 'date_format:Y-m-d H:i:s|before:end',
            'end' => 'date_format:Y-m-d H:i:s|after:start',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Preencha o Campo Título!',
            'title.min' => 'Título deve ter pelo menos 3 caracteres!',
            'start.date_format' => 'Preencha uma data Inicial com valor Válido!',
            'start.before' => 'A Data Inicial deve ser menor que a Data Final!',
//            'start.unique' => 'A data inicial esta conflitando com outra data existente',
            'end.date_format' => 'Preencha uma data Final com valor Válido!',
//            'end.unique' => 'A data Final esta conflitando com outra data existente',
            'end.after' => 'A Data Final deve ser Maior que a Data Inicial!',
        ];
    }
}
