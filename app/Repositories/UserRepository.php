<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\UserContract;

/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract
{

	protected $model = User::class;
}
