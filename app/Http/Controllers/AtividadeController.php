<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class AtividadeController extends VoyagerBaseController
{

    public function atividade_salvar_descricao(Request $request)
    {
        $request->session()->put('desc_atividade', $request->data);
    }

    public function atividade_recuperar_descricao(Request $request)
    {
        echo $request->session()->get('desc_atividade');
    }

    public function store(Request $request) 
    {
        $request->session()->put('desc_atividade', '');
        return parent::store($request);
    }
}
