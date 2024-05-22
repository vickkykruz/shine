<?php

namespace App\Services;

use Creativeorange\Gravatar\Facades\Gravatar;

class GravatarService
{
	/**
     * Get the Gravatar URL for the given email.
     *
     * @param string $email
     * @param int $size
     * @return string
     */
    public function getGravatarUrl(string $email, int $size = 250): string
    {
        return Gravatar::get($email, ['size' => $size]);
    }
}