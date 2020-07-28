<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Contracts\EmpresaContract;

/**
 * Class EmpresaRepository
 *
 * @package \App\Repositories
 */
class EmpresaRepository extends BaseRepository implements EmpresaContract
{
	protected $model = Empresa::class;
}
