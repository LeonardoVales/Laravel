<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $pessoa = Client::getPessoa($this->get('pessoa'));
        $rules = [
            'nome'      => 'required|max:20',
            'documento' => 'required',
            'email'     => 'required|email',
            'telefone'  => 'required',
        ];

        if ($pessoa == Client::PESSOA_FISICA) {
            $estadosCivis = implode(',', array_keys(Client::ESTADOS_CIVIS));
            $rules = array_merge($rules, [
                'data_nasc' => 'required|date',
                'estado_civil' => "required|in:$estadosCivis",
                'sexo' => 'required|in:m,f'
            ]);
        } else {
            $rules = array_merge($rules, [
                'fantasia' => 'required',
            ]);
        }
        
        return $rules;

    }
}
