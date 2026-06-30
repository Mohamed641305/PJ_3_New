<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            "password" => $this->password,
            'role' => $this->role,
            'status' => $this->status,
            'img_url' => $this->profile_image ? asset('images/users/' . $this->profile_image) : null,
            "created_at" => $this->created_at,
            "remember_token" => $this->created_at,
            "updated_at" => $this->created_at,
        ];
    }
}
