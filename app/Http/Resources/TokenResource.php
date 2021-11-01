<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'user' => [
                'id' => $this->user->id,
                'email' => $this->user->email,
            ],
            'access_token' => [
                'token' => $this->accessToken,
                'external_id' => $this->externalId,
                'expired_at' => (string)$this->expiredAt,
            ],
        ];
    }
}
