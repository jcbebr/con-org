<?php

namespace App\Actions;

use TCG\Voyager\Actions\EditAction;

class EditarAction extends EditAction
{
    public function getDefaultRoute()
    {
        if ($this->dataType->slug == 'avaliacao') {
            return route('avaliacao.edit', [$this->data->atividade_id, $this->data->id]);
        }
        return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }
}
