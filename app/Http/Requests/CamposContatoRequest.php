<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CamposContatoRequest extends FormRequest
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
            'txtNome' => 'required|max:80',
            'txtEmail' => 'required|email:rfc,dns|max:60',
            'txtTelefone' => 'required|between:10,11',
            'txtMensagem' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'txtNome.required' => 'Informe o seu nome.',
            'txtNome.max' => 'Seu nome excedeu o limite de 80 caracteres.',
            'txtTelefone.required' => 'Informe o seu telefone.',
            'txtTelefone.between' => 'Número de telefone inválido.',
            // 'txtTelefone.numeric' => 'Número de telefone deve conter somente números.',
            'txtEmail.required' => 'Informe o seu email.',
            'txtEmail.max' => 'Seu email excedeu o limite de 60 caracteres.',
            'txtMensagem.required' => 'Preencher o campo de mensagem.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'txtTelefone' => preg_replace('/[^0-9]/', '', $this->txtTelefone),
        ]);
    }
}
