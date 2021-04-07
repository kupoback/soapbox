<?php

namespace App\Http\Resources;

use App\Models\Team;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return parent::toResponse($request);
    }
}
