<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    /**
     * Uses soft delete
     */
    use SoftDeletes;

    /**
     * Table name
     */
    protected $table = "empresas";

    protected $fillable = [
        'id',
        'nome',
        'cnpj',
        'ativo',
        'empresa_id',
        'criado_por',
        'atualizado_por',
        'created_at',
        'updated_at'
    ];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function consorcios()
    {
        return $this->hasMany(Consorcio::class);
    }

    public function unidadesSaude()
    {
        return $this->hasMany(UnidadeSaude::class);
    }

    public function equipes()
    {
        return $this->hasMany(Equipe::class);
    }

    public function exames()
    {
        return $this->hasMany(Exame::class);
    }

    public function modelosLaudo()
    {
        return $this->hasMany(ModeloLaudo::class);
    }

    public function motivosInterrupcao()
    {
        return $this->hasMany(MotivoInterrupcao::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
