<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'permission' => $this->permission->name,
            'created_date' => \Carbon\Carbon::parse($this->created_at)->timezone(config('timezone.timezone'))->isoFormat('MMM D, YYYY'),
            'role' => $this->role->title
        ];
    }
}
