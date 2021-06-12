<?php

namespace App\Http\Controllers;

use App\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
	
	public function __construct(Veiculo $veiculo) {
        $this->veiculo = $veiculo;
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$veiculo = $this->veiculo->all();
        return $veiculo;
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
			
		$request->validate($this->veiculo->rules(),$this->veiculo->feedback());
		
		$veiculos = $this->veiculo->create($request->all());
        return response()->json($veiculos,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		
		$veiculo = $this->veiculo->find($id);
        if($veiculo === null) {
            return ['code' => '400'];
        } 

        return $veiculo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo $veiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		
		$veiculo = $this->veiculo->find($id);

        if($veiculo === null) {
            return ['code' => '400'];
        }

		if ($request->method() === 'PATCH'){
			
			$regrasDinamicas = array();
			
			foreach($veiculo->rules() as $input => $regra){				
				if (array_key_exists($input, $request->all())){
					$regrasDinamicas[$input] = $regra;
				}
			}
			
			$request->validate($regrasDinamicas,$veiculo->feedback());
		}
		else{
			$request->validate($veiculo->rules(),$veiculo->feedback());
		}
		
		
        $veiculo->update($request->all());
        return $veiculo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
		$veiculo = $this->veiculo->find($id);

        if($veiculo === null) {
            return ['code' => '400'];
        }

        $veiculo->delete();
        return ['code' => '200'];
    }
}
