<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DesignerResource;
use App\Http\Resources\CollectionResource;

class CollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='collections';
    public function toArray($request)
    {
       // return parent::toArray($request);
       return[
        'id'=>$this->resource->id,
        'name'=>$this->resource->name,
        'season'=>$this->resource->season,
       'designer_id'=> new DesignerResource($this->resource->designer)
    ];

    }
}
