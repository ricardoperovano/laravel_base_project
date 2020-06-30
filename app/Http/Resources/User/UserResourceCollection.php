<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResourceCollection extends ResourceCollection
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
			return new UserResource($data);
		})->toArray();
	}
}