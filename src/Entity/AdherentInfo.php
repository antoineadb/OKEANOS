<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * AdherentInfo
 *
 * @ORM\Table(name="adherent_info", indexes={@ORM\Index(name="fk_photo_id", columns={"fk_photo_id"}), @ORM\Index(name="fk_account_id", columns={"fk_account_id"})})
 * @ORM\Entity
 * @ApiResource(
 *  collectionOperations={ "get", "post"},
 * attributes={ "input_formats"={"json"={"application/json"}}, "output_formats"={"json"={"application/json"}}}
 *  )
 */
class AdherentInfo
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
     * @ORM\Column(name="firstname", type="string", length=512, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=512, nullable=false)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birsthday", type="date", nullable=false)
     */
    private $birsthday;

    /**
     * @var string|null
     *
     * @ORM\Column(name="birthplace", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $birthplace = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="licence_number", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $licenceNumber = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $adresse = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip_code", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $zipCode = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $city = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="job", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $job = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel_number", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $telNumber = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobile_number", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $mobileNumber = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="emergency_contact", type="string", length=512, nullable=true, options={"default"="NULL"})
     */
    private $emergencyContact = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="emergency_tel_number", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $emergencyTelNumber = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=true, options={"default"="sysdate()"})
     */
    private $createdon = 'sysdate()';

    /**
     * @var \Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_account_id", referencedColumnName="id")
     * })
     */
    private $fkAccount;

    /**
     * @var \AdherentDocument
     *
     * @ORM\ManyToOne(targetEntity="AdherentDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_photo_id", referencedColumnName="id")
     * })
     */
    private $fkPhoto;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirsthday(): ?\DateTimeInterface
    {
        return $this->birsthday;
    }

    public function setBirsthday(\DateTimeInterface $birsthday): self
    {
        $this->birsthday = $birsthday;

        return $this;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(?string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    public function getLicenceNumber(): ?string
    {
        return $this->licenceNumber;
    }

    public function setLicenceNumber(?string $licenceNumber): self
    {
        $this->licenceNumber = $licenceNumber;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getTelNumber(): ?string
    {
        return $this->telNumber;
    }

    public function setTelNumber(?string $telNumber): self
    {
        $this->telNumber = $telNumber;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    public function setMobileNumber(?string $mobileNumber): self
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    public function getEmergencyContact(): ?string
    {
        return $this->emergencyContact;
    }

    public function setEmergencyContact(?string $emergencyContact): self
    {
        $this->emergencyContact = $emergencyContact;

        return $this;
    }

    public function getEmergencyTelNumber(): ?string
    {
        return $this->emergencyTelNumber;
    }

    public function setEmergencyTelNumber(?string $emergencyTelNumber): self
    {
        $this->emergencyTelNumber = $emergencyTelNumber;

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

    public function getFkAccount(): ?Account
    {
        return $this->fkAccount;
    }

    public function setFkAccount(?Account $fkAccount): self
    {
        $this->fkAccount = $fkAccount;

        return $this;
    }

    public function getFkPhoto(): ?AdherentDocument
    {
        return $this->fkPhoto;
    }

    public function setFkPhoto(?AdherentDocument $fkPhoto): self
    {
        $this->fkPhoto = $fkPhoto;

        return $this;
    }


}
