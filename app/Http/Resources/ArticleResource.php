<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this);
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'article_title'=>$this->title,
            'pages'=>$this->no_of_pages,
            'author'=>new UserResource($this->user),
//            "user"=>new FullUserResource($this->user),
        ];
    }
}
