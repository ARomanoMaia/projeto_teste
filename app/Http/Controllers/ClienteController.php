<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
	
	
	public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = $this->cliente->all();
        return $cliente;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->cliente->rules(),$this->cliente->feedback());
		
		$clientes = $this->cliente->create($request->all());
        return response()->json($clientes,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);
        if($cliente === null) {
            return ['code' => '400'];
        } 

        return $cliente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = $this->cliente->find($id);

        if($cliente === null) {
            return ['code' => '400'];
        }

		if ($request->method() === 'PATCH'){
			
			$regrasDinamicas = array();
			
			
			foreach($cliente->rules() as $input => $regra){				
				if (array_key_exists($input, $request->all())){
					$regrasDinamicas[$input] = $regra;
				}
			}
			
			$request->validate($regrasDinamicas,$cliente->feedback());
		}
		else{
			$request->validate($cliente->rules(),$cliente->feedback());
		}
		
		
        $cliente->update($request->all());
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);

        if($cliente === null) {
            return ['code' => '400'];
        }

        $cliente->delete();
        return ['code' => '200'];
    }
}
