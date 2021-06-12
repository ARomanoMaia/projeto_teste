<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	// Lista dos campos em ordem de cadastro
    protected $fillable = ['nome', 'email', 'documento'];
	
	// Regras para os campos, conforme necessitado
	public function rules(){
		return [
			'nome' => 'required',
			'email' => 'required|unique:clientes,documento,'.$this->id,
			'documento' => 'required|unique:clientes,documento,'.$this->id
		];
	}
	
	// Retorno ao usuário com texto mais simplificado, conforme as regras.
	public function feedback(){
		return [
			'required' => 'O campo :attribute é obrigatório',
			'email.unique' => 'E-mail já existente',
			'documento.unique' => 'Documento já existente'
		];
	}
}
