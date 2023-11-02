<?php

namespace Training\Bundle\UserNamingBundle\EventListener;

use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;
use Oro\Bundle\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserViewNamingListener
{
    public function __construct(private AuthorizationCheckerInterface $authChecker)
    {

    }

    /**
     * @param BeforeListRenderEvent $event
     */
    public function onUserView(BeforeListRenderEvent $event): void
    {
        if(!$this->authChecker->isGranted('user_naming_info_view')) {
            return;
        }

        /** @var User $user */
        $user = $event->getEntity();
        if (!$user) {
            return;
        }

        $template = $event->getEnvironment()->render(
            '@TrainingUserNaming/User/namingData.html.twig',
            ['entity' => $user]
        );

        $subBlockId = $event->getScrollData()->addSubBlock(0);
        $event->getScrollData()->addSubBlockData(0, $subBlockId, $template);
    }
}
