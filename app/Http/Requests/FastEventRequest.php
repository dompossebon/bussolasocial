<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FastEventRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'start' => 'date_format:H:i:s|before:end|after:00:00:00',
            'end' => 'date_format:H:i:s|after:start',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Preencha o Campo Título!',
            'title.min' => 'Título deve ter pelo menos 3 caracteres!',
            'start.date_format' => 'Preencha a Hora Inicial com valor Válido!',
            'start.before' => 'A Hora Inicial deve ser Menor que a Hora Final!',
            'start.after' => 'A Hora Inicial deve ser Maior que 00:00:00!',
            'end.date_format' => 'Preencha a Hora Final com valor Válido!',
            'end.after' => 'A Hora Final deve ser Maior que a Hora Inicial',
        ];
    }
}
