<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * SubscriptionType
 *
 * @ORM\Table(name="subscription_type")
 * @ORM\Entity
 * @ApiResource
 */
class SubscriptionType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=56, nullable=false)
     */
    private $label;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=true, options={"default"="sysdate()"})
     */
    private $createdon = 'sysdate()';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCreatedon(): ?\DateTimeInterface
    {
        return $this->createdon;
    }

    public function setCreatedon(?\DateTimeInterface $createdon): self
    {
        $this->createdon = $createdon;

        return $this;
    }


}
