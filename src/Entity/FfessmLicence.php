<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FfessmLicence
 *
 * @ORM\Table(name="ffessm_licence")
 * @ORM\Entity
 */
class FfessmLicence
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
     * @var int
     *
     * @ORM\Column(name="fk_saison_id", type="bigint", nullable=false)
     */
    private $fkSaisonId;

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

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getFkSaisonId(): ?string
    {
        return $this->fkSaisonId;
    }

    public function setFkSaisonId(string $fkSaisonId): self
    {
        $this->fkSaisonId = $fkSaisonId;

        return $this;
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


}
