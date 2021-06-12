<?php

namespace App\Http\Controllers;

use App\Locacao;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
	
	public function __construct(Locacao $locacao) {
        $this->locacao = $locacao;
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return response()->json($this->locacao->all(),200);
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
        $request->validate($this->locacao->rules(),$this->locacao->feedback());
		
		$locacao = $this->locacao->create($request->all());
        return response()->json($locacao,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locacao = $this->locacao->find($id);
        if($locacao === null) {
            return ['code' => '400'];
        } 

        return $locacao;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Locacao $locacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locacao = $this->locacao->find($id);

        if($locacao === null) {
            return ['code' => '400'];
        }

		if ($request->method() === 'PATCH'){
			
			$regrasDinamicas = array();
						
			foreach($locacao->rules() as $input => $regra){				
				if (array_key_exists($input, $request->all())){
					$regrasDinamicas[$input] = $regra;
				}
			}
			
			$request->validate($regrasDinamicas,$locacao->feedback());
		}
		else{
			$request->validate($locacao->rules(),$locacao->feedback());
		}
		
		
        $locacao->update($request->all());
        return $locacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locacao = $this->locacao->find($id);

        if($locacao === null) {
            return ['code' => '400'];
        }

        $locacao->delete();
        return ['code' => '200'];
    }
}
