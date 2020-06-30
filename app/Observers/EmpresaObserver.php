<?php

namespace App\Observers;

use App\Models\Empresa;

class EmpresaObserver
{
    /**
     * Handle the empresa "created" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function created(Empresa $empresa)
    {
        //
    }

    /**
     * Handle the empresa "updated" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function updated(Empresa $empresa)
    {
        //
    }

    /**
     * Handle the empresa "deleted" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function deleted(Empresa $empresa)
    {
        //
    }

    /**
     * Handle the empresa "restored" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function restored(Empresa $empresa)
    {
        //
    }

    /**
     * Handle the empresa "force deleted" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function forceDeleted(Empresa $empresa)
    {
        //
    }
}
