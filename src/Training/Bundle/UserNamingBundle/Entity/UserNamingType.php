<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityTrait;

/**
 * ORM Entity UserNamingType.
 *
 * @ORM\Entity()
 * @ORM\Table(name="unb_user_naming_type")
 * @Config(
 *     defaultValues={
 *         "entity"={
 *             "icon"="fa-address-card",
 *             "label"="User Naming Type",
 *             "plural_label"="User Naming Types",
 *             "description"="Contains how to display user`s name."
 *         },
 *         "security"={
 *             "type"="ACL",
 *             "group_name"="",
 *             "permissions"="All",
 *             "category"="account_management"
 *         }
 *     }
 * )
 */
class UserNamingType implements ExtendEntityInterface
{
    use ExtendEntityTrait;

    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private ?string $title = null;

    /**
     * @var string|null
     * Allowed placeholders are: PREFIX, FIRST, MIDDLE, LAST, SUFFIX
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private ?string $format = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }
}
