<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoAtividade;
use App\Models\RoteiroAtividade;
use App\Scopes\AtividadeAvaliacaoScope;
use App\Scopes\RoteiroAtividadeScope;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class RoteiroAtividadeController extends VoyagerBaseController
{

    public $slug = 'roteiro-atividade';

    public function show(Request $request, $id)
    {
        $roteiro_id = $request->route('roteiro_id');
        $id = $request->route('id');
        $view = parent::show($request, $id);
        return $view->with('roteiro_id', $roteiro_id);
    }

    public function index(Request $request)
    {
        $roteiro_id = $request->route('roteiro_id');

        RoteiroAtividade::addGlobalScope(new RoteiroAtividadeScope($roteiro_id));

        $view = parent::index($request);
        return $view->with('roteiro_id', $roteiro_id);
    }

    public function edit(Request $request, $id)
    {
        $roteiro_id = $request->route('roteiro_id');
        $id = $request->route('id');
        $view = parent::edit($request, $id);
        return $view->with('roteiro_id', $roteiro_id);
    }

    public function create(Request $request)
    {
        $roteiro_id = $request->route('roteiro_id');

        $view = parent::create($request);
        return $view->with('roteiro_id', $roteiro_id);
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
        return redirect()->route("roteiro-atividade.index", [$request->route('roteiro_id')]);
    }

    public function update(Request $request, $id) 
    {
        $roteiro_id = $request->route('roteiro_id');
        $id = $request->route('id');
        parent::update($request, $id);
        return redirect()->route("roteiro-atividade.index", $roteiro_id);
    }

    public function destroy(Request $request, $id) {
        $roteiro_id = $request->route('roteiro_id');
        $id = $request->route('id');
        parent::destroy($request, $id);
        return redirect()->route("roteiro-atividade.index", $roteiro_id);
    }
}
