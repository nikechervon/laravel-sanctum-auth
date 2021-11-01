<?php

namespace App\DTO;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

class TokenDTO
{
    /**
     * @var User
     */
    public User $user;

    /**
     * @var string
     */
    public string $accessToken;

    /**
     * @var string
     */
    public string $externalId;

    /**
     * @var string
     */
    public string $expiredAt;

    /**
     * @param User $user
     * @param NewAccessToken $accessToken
     */
    public function __construct(User $user, NewAccessToken $accessToken)
    {
        $this->user = $user;
        $this->accessToken = $accessToken->plainTextToken;
        $this->externalId = $accessToken->accessToken->id;
        $this->expiredAt = now()->addMinutes(config('sanctum.expiration'));
    }
}
