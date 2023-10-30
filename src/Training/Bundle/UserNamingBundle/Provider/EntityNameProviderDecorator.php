<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UserBundle\Entity\User;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class EntityNameProviderDecorator implements EntityNameProviderInterface
{
    public function __construct(private EntityNameProviderInterface $originalProvider)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function getName($format, $locale, $entity): string
    {
        if ($entity instanceof User) {
            /** @var UserNamingType|null $namingType */
            $namingType = $entity->get('typeOfNaming');
            if ($namingType) {
                return $this->getFullUserName($entity, $namingType->getFormat());
            }
        }

        return $this->originalProvider->getName($format, $locale, $entity);
    }

    /**
     * {@inheritDoc}
     */
    public function getNameDQL($format, $locale, $className, $alias): string
    {
        return $this->originalProvider->getNameDQL($format, $locale, $className, $alias);
    }

    /**
     * Returns full user`s name according to the provided format
     *
     * @param User $user
     * @param string $format
     * @return string
     */
    private function getFullUserName(User $user, string $format): string
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
