<?php

namespace App\Http\Resources\UsuarioEmpresa;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsuarioEmpresaResourceCollection extends ResourceCollection
{
	/**
	 * Transform the resource collection into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	*/
	public function toArray($request)
	{
		return $this->collection->transform(function($data){
			return new UsuarioEmpresaResource($data);
		})->toArray();
	}
}