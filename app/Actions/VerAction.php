<?php

namespace App\Actions;

use TCG\Voyager\Actions\ViewAction;

class VerAction extends ViewAction
{
    public function getDefaultRoute()
    {
        if ($this->dataType->slug == 'avaliacao') {
            return route('avaliacao.show', [$this->data->atividade_id, $this->data->id]);
        }
        return route('voyager.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
    }
}
