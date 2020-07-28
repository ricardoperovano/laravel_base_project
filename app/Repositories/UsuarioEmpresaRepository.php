<?php

namespace App\Repositories;

use App\Models\UsuarioEmpresa;
use App\Contracts\UsuarioEmpresaContract;

/**
 * Class UsuarioEmpresaRepository
 *
 * @package \App\Repositories
 */
class UsuarioEmpresaRepository extends BaseRepository implements UsuarioEmpresaContract
{

	protected $model = UsuarioEmpresa::class;
}
