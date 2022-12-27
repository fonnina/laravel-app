<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DesignerResource;


class DesignerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap='designers';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
        'id'=>$this->resource->id,
        'name'=>$this->resource->name,
        'age'=>$this->resource->age,
        'career_age'=> $this->resource->career_age
        ];
    }
}
