<?php

namespace App\Repositories;

use App\Models\Log;
use App\Contracts\LogContract;

/**
 * Class LogRepository
 *
 * @package \App\Repositories
 */
class LogRepository extends BaseRepository implements LogContract
{

	protected $model = Log::class;
}
