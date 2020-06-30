<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersistLogChunks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $table;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $table = "logs")
    {
        $this->data = $data;
        $this->table = $table;
        $this->queue = "default";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table($this->table)->insert($this->data->toArray());
    }
}
