<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
	// Lista dos campos em ordem de cadastro
    protected $fillable = ['veiculo_id', 'cliente_id', 'data_inicio', 'data_final'];
	
	// Regras para os campos, conforme necessitado
	public function rules(){
		return [
			'veiculo_id' => 'exists:veiculos,id',
			'cliente_id' => 'exists:clientes,id',
			'data_inicio' => 'required',
			'data_final' => 'required'
		];
	}
	
	// Retorno ao usuário com texto mais simplificado, conforme as regras.
	public function feedback(){
		return [
			'required' => 'O campo :attribute é obrigatório'
		];
	}
}
