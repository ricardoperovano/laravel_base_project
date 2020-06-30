<?php

namespace App\Http\Resources\Log;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LogResourceCollection extends ResourceCollection
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
			return new LogResource($data);
		})->toArray();
	}
}