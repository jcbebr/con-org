<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoAtividade;
use App\Scopes\AtividadeAvaliacaoScope;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class AvaliacaoAtividadeController extends VoyagerBaseController
{

    public $slug = 'avaliacao';

    public function show(Request $request, $id)
    {
        $atividade_id = $request->route('atividade_id');
        $id = $request->route('id');
        $view = parent::show($request, $id);
        return $view->with('atividade_id', $atividade_id);
    }

    public function index(Request $request)
    {
        $atividade_id = $request->route('atividade_id');

        AvaliacaoAtividade::addGlobalScope(new AtividadeAvaliacaoScope($atividade_id));

        $view = parent::index($request);
        return $view->with('atividade_id', $atividade_id);
    }

    public function edit(Request $request, $id)
    {
        $atividade_id = $request->route('atividade_id');
        $id = $request->route('id');
        $view = parent::edit($request, $id);
        return $view->with('atividade_id', $atividade_id);
    }

    public function create(Request $request)
    {
        $atividade_id = $request->route('atividade_id');

        $view = parent::create($request);
        return $view->with('atividade_id', $atividade_id);
    }

    public function atv(Request $request)
    {
        echo $request->route('av_id') . '<br>';
        echo $request->route('id');
        dd($request);
    }

    public function store(Request $request) 
    {
        parent::store($request);
        return redirect()->route("avaliacao.index", [$request->route('atividade_id')]);
    }

    public function update(Request $request, $id) 
    {
        $atividade_id = $request->route('atividade_id');
        $id = $request->route('id');
        parent::update($request, $id);
        return redirect()->route("avaliacao.index", $atividade_id);
    }

    public function destroy(Request $request, $id) {
        $atividade_id = $request->route('atividade_id');
        $id = $request->route('id');
        parent::destroy($request, $id);
        return redirect()->route("avaliacao.index", $atividade_id);
    }
}
