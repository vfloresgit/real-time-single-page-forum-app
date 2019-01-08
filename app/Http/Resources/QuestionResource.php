<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class QuestionResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'title'=>$this->title,
            'slug'=>$this->slug,
            'replies'=>$this->replies,
            'reply_count'=>$this->replies->count(),
            'path'=>$this->path,
            'body'=>$this->body,
            'created_at'=>$this->created_at->diffForHumans(),
            'user'=>$this->user->name,
            'user_id'=>$this->user_id,
        ];
    }
}
