<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity
 */
class Account
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
     * @ORM\Column(name="mail", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $mail = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="salt", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $salt = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $password = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="admin", type="boolean", nullable=true)
     */
    private $admin = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $createdon = 'current_timestamp()';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(?bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getCreatedon(): ?\DateTimeInterface
    {
        return $this->createdon;
    }

    public function setCreatedon(\DateTimeInterface $createdon): self
    {
        $this->createdon = $createdon;

        return $this;
    }


}
