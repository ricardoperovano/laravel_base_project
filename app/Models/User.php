<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'ativo',
        'super_user',
        'empresa_id',
        'api_only_user',
        'username',
        'paciente_id',
        'avatar',
        'criado_por',
        'atualizado_por'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'empresa_id'    => $this->empresa_id,
            'name'          => $this->name,
            'email'         => $this->email
        ];
    }

    public function can($permission, $arguments = [])
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->where('name', $permission)->first()) {
                return true;
            }
        }

        return false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, "model_has_roles", "model_id")
            ->where('model_has_roles.empresa_id', $this->empresa_id);
    }

    /**
     * Verify if user has permission
     */
    public function allowed($permission)
    {
        $roles = $this->roles()->where('roles.empresa_id', $this->empresa_id)->orWhere('name', 'manager')->get();

        foreach ($roles as $role) {
            if ($role->permissions->where('name', $permission)->first()) {
                return true;
            }
        }

        return false;
    }
}
