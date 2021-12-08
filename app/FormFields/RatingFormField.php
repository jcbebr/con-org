<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class RatingFormField extends AbstractHandler
{
    protected $codename = 'rating';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('ratingformview', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}