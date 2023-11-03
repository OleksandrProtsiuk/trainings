<?php

namespace Training\Bundle\UserNamingBundle\Api\Processor\Get;

use Oro\Bundle\ApiBundle\Processor\Get\GetContext;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;
use Training\Bundle\UserNamingBundle\Provider\FullNameProvider;

class NamingExampleGetProcessor implements ProcessorInterface
{
    public function __construct(private FullNameProvider $fullNameProvider)
    {
    }

    /**
     * @inheritDoc
     */
    public function process(ContextInterface $context): void
    {
        /** @var GetContext $context */
        $result = $context->getResult();

        if (is_array($result)
            && array_key_exists('format', $result)
            && !array_key_exists('namingExample', $result)
        ) {
            $result['namingExample'] = $this->fullNameProvider->getFullUserNameExample($result['format']);
        }

        $context->setResult($result);
    }
}