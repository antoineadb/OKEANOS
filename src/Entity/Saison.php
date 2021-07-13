<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity
 */
class Saison
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
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $label = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $startDate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $endDate = 'NULL';

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

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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
