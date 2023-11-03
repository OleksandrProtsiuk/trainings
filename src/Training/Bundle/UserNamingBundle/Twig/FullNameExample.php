<?php

namespace Training\Bundle\UserNamingBundle\Twig;

use Training\Bundle\UserNamingBundle\Provider\FullNameProvider;
use Twig\Extension\RuntimeExtensionInterface;
use Oro\Bundle\UserBundle\Entity\User;

class FullNameExample implements RuntimeExtensionInterface
{
    public function __construct(private FullNameProvider $fullNameProvider)
    {

    }

    /**
     * Returns example of full user`s name according to the provided format
     *
     * @param string $format
     * @return string
     */
    public function getFullNameExample(string $format): string
    {
        return $this->fullNameProvider->getFullUserNameExample($format);
    }
}
