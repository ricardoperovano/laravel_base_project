<?php

namespace App\Observers;

use App\Models\Log;

class LogObserver
{
    /**
     * Handle the log "created" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function created(Log $log)
    {
        //
    }

    /**
     * Handle the log "updated" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function updated(Log $log)
    {
        //
    }

    /**
     * Handle the log "deleted" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function deleted(Log $log)
    {
        //
    }

    /**
     * Handle the log "restored" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function restored(Log $log)
    {
        //
    }

    /**
     * Handle the log "force deleted" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function forceDeleted(Log $log)
    {
        //
    }
}
