<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * RequireInsurance
 *
 * @ORM\Table(name="require_insurance", indexes={@ORM\Index(name="fk_subscription_id", columns={"fk_subscription_id"}), @ORM\Index(name="fk_insurance_id", columns={"fk_insurance_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class RequireInsurance
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=true, options={"default"="sysdate()"})
     */
    private $createdon = 'sysdate()';

    /**
     * @var \Subscription
     *
     * @ORM\ManyToOne(targetEntity="Subscription")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_subscription_id", referencedColumnName="id")
     * })
     */
    private $fkSubscription;

    /**
     * @var \Insurance
     *
     * @ORM\ManyToOne(targetEntity="Insurance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_insurance_id", referencedColumnName="id")
     * })
     */
    private $fkInsurance;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getFkSubscription(): ?Subscription
    {
        return $this->fkSubscription;
    }

    public function setFkSubscription(?Subscription $fkSubscription): self
    {
        $this->fkSubscription = $fkSubscription;

        return $this;
    }

    public function getFkInsurance(): ?Insurance
    {
        return $this->fkInsurance;
    }

    public function setFkInsurance(?Insurance $fkInsurance): self
    {
        $this->fkInsurance = $fkInsurance;

        return $this;
    }


}
