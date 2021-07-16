<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * AdherentDocument
 *
 * @ORM\Table(name="adherent_document")
 * @ORM\Entity
 * @ApiResource
 */
class AdherentDocument
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
     * @ORM\Column(name="file_type", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $fileType = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="content_disposition", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $contentDisposition = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="data", type="blob", length=0, nullable=true, options={"default"="NULL"})
     */
    private $data = 'NULL';

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

    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    public function setFileType(?string $fileType): self
    {
        $this->fileType = $fileType;

        return $this;
    }

    public function getContentDisposition(): ?string
    {
        return $this->contentDisposition;
    }

    public function setContentDisposition(?string $contentDisposition): self
    {
        $this->contentDisposition = $contentDisposition;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;

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
