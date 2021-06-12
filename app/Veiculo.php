<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    // Lista dos campos em ordem de cadastro
	protected $fillable = ['marca', 'modelo', 'placa'];
	
	// Regras para os campos, conforme necessitado
	public function rules(){
		return [
			'marca' => 'required',
			'modelo' => 'required',
			'placa' => 'required|unique:veiculos,placa,'.$this->id
		];
	}
	
	// Retorno ao usuário com texto mais simplificado, conforme as regras.
	public function feedback(){
		return [
			'required' => 'O campo :attribute é obrigatório',
			'placa.unique' => 'Placa já existente'
		];
	}
	
}
