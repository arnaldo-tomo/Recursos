<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacao extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ano_letivo' => 'required',
            'descricao' => 'required',
            'inicio_aulas' => 'required',
            'termino_aulas' => 'required',
        ];
    }
}
