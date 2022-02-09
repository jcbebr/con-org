<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RoteiroAtividadeVoltarAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Voltar';
    }

    public function getIcon()
    {
        return 'voyager-angle-left';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.roteiro');
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'roteiro-atividade';
    }

    public function massAction($ids, $comingFrom)
    {
        return redirect('/roteiro');
    }
}
