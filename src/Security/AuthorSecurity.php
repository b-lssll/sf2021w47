<?php

namespace App\Security;

use Symfony\Component\Security\Core\Security;

class AuthorSecurity
{
    /**
     * @var Security
     */
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
}