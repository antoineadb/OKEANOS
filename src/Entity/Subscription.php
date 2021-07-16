<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription", indexes={@ORM\Index(name="fk_saison_id", columns={"fk_saison_id"}), @ORM\Index(name="fk_subscription_type_id", columns={"fk_subscription_type_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class Subscription
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
     * @ORM\Column(name="label", type="string", length=512, nullable=false)
     */
    private $label;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=true, options={"default"="sysdate()"})
     */
    private $createdon = 'sysdate()';

    /**
     * @var \Saison
     *
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_saison_id", referencedColumnName="id")
     * })
     */
    private $fkSaison;

    /**
     * @var \SubscriptionType
     *
     * @ORM\ManyToOne(targetEntity="SubscriptionType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_subscription_type_id", referencedColumnName="id")
     * })
     */
    private $fkSubscriptionType;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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

    public function getFkSaison(): ?Saison
    {
        return $this->fkSaison;
    }

    public function setFkSaison(?Saison $fkSaison): self
    {
        $this->fkSaison = $fkSaison;

        return $this;
    }

    public function getFkSubscriptionType(): ?SubscriptionType
    {
        return $this->fkSubscriptionType;
    }

    public function setFkSubscriptionType(?SubscriptionType $fkSubscriptionType): self
    {
        $this->fkSubscriptionType = $fkSubscriptionType;

        return $this;
    }


}
