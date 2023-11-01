<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

/**
 *
 * @Route("/type", name="user_naming_type_")
 */
class UserNamingTypeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Template
     */
    public function indexAction(): array
    {
        return [
            'entity_class' => UserNamingType::class
        ];
    }

    /**
     * @Route("/view/{id}", name="view", requirements={"id"="\d+"})
     * @Template
     */
    public function viewAction(UserNamingType $type): array
    {
        return [
            'entity_class' => UserNamingType::class,
            'entity' => $type
        ];
    }
}
