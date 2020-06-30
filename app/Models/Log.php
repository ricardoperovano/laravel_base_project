<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    /**
     * Uses soft delete
     */
    use SoftDeletes;

    /**
     * Table name
     */
    protected $table = "logs";

    /**
     * Mass assign fields
     */
    protected $fillable = [
        'acao',
        'classe',
        'objeto_original',
        'objeto_modificado',
        'data',
        'model_id',
        'empresa_id',
        'criado_por',
        'atualizado_por',
        'created_at',
        'updated_at'
    ];
}
