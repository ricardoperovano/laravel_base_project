<?php

namespace App\Http\Resources\UsuarioEmpresa;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioEmpresaResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	*/
	public function toArray($request)
	{
		return $this->resource;
	}
}