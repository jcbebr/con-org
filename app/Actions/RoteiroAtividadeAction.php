<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RoteiroAtividadeAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Atividades';
    }

    public function getIcon()
    {
        return 'voyager-star-two';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right   ',
            'style' => 'margin-right: 5px;',
        ];
    }

    public function getDefaultRoute()
    {
        return route('roteiro-atividade.index', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'roteiro';
    }

}
