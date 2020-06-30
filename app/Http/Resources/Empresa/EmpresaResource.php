<?php

namespace App\Http\Resources\Empresa;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
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