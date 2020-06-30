<?php

namespace App\Observers;

use App\Models\UsuarioEmpresa;

class UsuarioEmpresaObserver
{
    /**
     * Handle the usuario empresa "created" event.
     *
     * @param  \App\Models\UsuarioEmpresa  $usuarioEmpresa
     * @return void
     */
    public function created(UsuarioEmpresa $usuarioEmpresa)
    {
        //
    }

    /**
     * Handle the usuario empresa "updated" event.
     *
     * @param  \App\Models\UsuarioEmpresa  $usuarioEmpresa
     * @return void
     */
    public function updated(UsuarioEmpresa $usuarioEmpresa)
    {
        //
    }

    /**
     * Handle the usuario empresa "deleted" event.
     *
     * @param  \App\Models\UsuarioEmpresa  $usuarioEmpresa
     * @return void
     */
    public function deleted(UsuarioEmpresa $usuarioEmpresa)
    {
        //
    }

    /**
     * Handle the usuario empresa "restored" event.
     *
     * @param  \App\Models\UsuarioEmpresa  $usuarioEmpresa
     * @return void
     */
    public function restored(UsuarioEmpresa $usuarioEmpresa)
    {
        //
    }

    /**
     * Handle the usuario empresa "force deleted" event.
     *
     * @param  \App\Models\UsuarioEmpresa  $usuarioEmpresa
     * @return void
     */
    public function forceDeleted(UsuarioEmpresa $usuarioEmpresa)
    {
        //
    }
}
