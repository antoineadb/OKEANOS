<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * FfessmLicence
 *
 * @ORM\Table(name="ffessm_licence")
 * @ORM\Entity
 * @ApiResource(
 *  collectionOperations={ "get", "post"},
 * attributes={ "input_formats"={"json"={"application/json"}}, "output_formats"={"json"={"application/json"}}}
 *  )
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
     * @Assert\NotBlank(message="L'id de la saison est obligatoire")
     * @ORM\Column(name="fk_saison_id", type="bigint", nullable=false)
     *
     * @Groups("licence")
     */
    private $fkSaisonId;

    /**
     * @var string
     * @Assert\NotBlank(message="le label est obligatoire")
     * @ORM\Column(name="label", type="string", length=512, nullable=false)
     *  @Groups("licence")
     */
    private $label;

    /**
     * @var float
     * @Assert\NotBlank(message="le prix est obligatoire")
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     *  @Groups("licence")
     */
    private $price;

    /**
     * @var \DateTime|null
     * @Groups("licence")
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
