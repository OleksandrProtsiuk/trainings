<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UserBundle\Entity\User;

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

            return sprintf('%s %s %s',
                $entity->getLastName(),
                $entity->getFirstName(),
                $entity->getMiddleName());
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
}
