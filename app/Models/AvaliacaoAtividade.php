<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AvaliacaoAtividade extends Model
{
    use HasFactory;

    protected $table = 'avaliacao_atividade';
    
    public function save(array $options = [])
    {
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->getKey();
        }

        return parent::save();
    }
}
