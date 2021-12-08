<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AtividadeAvaliacaoScope implements Scope
{

    private $atividade_id;

    function __construct($atividade_id)
    {
        $this->atividade_id = $atividade_id;
    }
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('atividade_id', '=', $this->atividade_id);
    }
}