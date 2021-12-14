<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Contracts\User;
use TCG\Voyager\Policies\BasePolicy;

class RoteiroPolicy extends BasePolicy
{

    /**
     * Determina se a atividade pertence ao usuáio
     *
     * @param \TCG\Voyager\Contracts\User$user
     * @param \App\Models\Atividade $model
     *
     * @return bool
     */
    private function pertenceAoUsuaio(User $user, $model)
    {
        $current = $user->id === $model->user_id;
        $admin = Auth::user()->hasRole('admin');

        return ($current || $admin) && $this->checkPermission($user, $model, 'edit');
    }

    /**
     * Determina se a atividade pode ser editada pelo usuáio
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param $model
     *
     * @return bool
     */
    public function edit(User $user, $model)
    {
        return $this->pertenceAoUsuaio($user, $model);
    }

    /**
     * Determina se a atividade pode ser editada pelo usuáio
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function delete(User $user, $model)
    {
        return $this->pertenceAoUsuaio($user, $model);
    }
}
