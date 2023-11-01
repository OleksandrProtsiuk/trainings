<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\UserBundle\Entity\User;

class FullNameProvider
{
    /**
     * Returns full user`s name according to the provided format
     *
     * @param User $user
     * @param string $format
     * @return string
     */
    public function getFullUserName(User $user, string $format): string
    {
        return strtr(
            $format,
            [
                'PREFIX' => $user->getNamePrefix(),
                'FIRST' => $user->getFirstName(),
                'MIDDLE' => $user->getMiddleName(),
                'LAST' => $user->getLastName(),
                'SUFFIX' => $user->getNameSuffix(),
            ]
        );
    }

}
