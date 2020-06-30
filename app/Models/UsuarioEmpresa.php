<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioEmpresa extends Model
{
    /**
     * Uses soft delete
     */
    use SoftDeletes;

    /**
     * Table name
     */
    protected $table = "usuario_empresa";
}
