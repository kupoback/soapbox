<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicsResource extends ResourceCollection
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
        // $comments = Comment::all();
        // dd($request->id);
        return parent::toResponse($request);
    }
}
