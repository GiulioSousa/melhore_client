<?php

namespace Melhore\Client\Helper;

use Melhore\Client\Entity\User;

trait SetUserTrait
{
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}