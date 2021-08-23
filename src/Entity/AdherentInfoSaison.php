<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * AdherentInfoSaison
 *
 * @ORM\Table(name="adherent_info_saison", indexes={@ORM\Index(name="fk_ffessm_licence_id", columns={"fk_ffessm_licence_id"}), @ORM\Index(name="fk_actual_training_id", columns={"fk_actual_training_id"}), @ORM\Index(name="fk_sick_note_id", columns={"fk_sick_note_id"}), @ORM\Index(name="fk_account_id", columns={"fk_account_id"}), @ORM\Index(name="fk_subscription_id", columns={"fk_subscription_id"}), @ORM\Index(name="fk_training_id", columns={"fk_training_id"}), @ORM\Index(name="fk_parental_agreement_id", columns={"fk_parental_agreement_id"}), @ORM\Index(name="fk_saison_id", columns={"fk_saison_id"}), @ORM\Index(name="fk_insurance_id", columns={"fk_insurance_id"}), @ORM\Index(name="fk_team_id", columns={"fk_team_id"}), @ORM\Index(name="fk_certificate_licence_id", columns={"fk_certificate_licence_id"})})
 * @ORM\Entity
 * @ApiResource(
 *  collectionOperations={ "get", "post"},
 * attributes={ "input_formats"={"json"={"application/json"}}, "output_formats"={"json"={"application/json"}}}
 *  )
 */
class AdherentInfoSaison
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
     * @var bool|null
     *
     * @ORM\Column(name="picture_authorisation", type="boolean", nullable=true)
     */
    private $pictureAuthorisation = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="nead_certificate", type="boolean", nullable=true)
     */
    private $neadCertificate = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_start", type="boolean", nullable=true)
     */
    private $validationStart = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_general_informations", type="boolean", nullable=true)
     */
    private $validationGeneralInformations = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_licence", type="boolean", nullable=true)
     */
    private $validationLicence = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_sick_note", type="boolean", nullable=true)
     */
    private $validationSickNote = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_parental_agreement", type="boolean", nullable=true)
     */
    private $validationParentalAgreement = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_payment_transmitted", type="boolean", nullable=true)
     */
    private $validationPaymentTransmitted = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validation_payment_cashed", type="boolean", nullable=true)
     */
    private $validationPaymentCashed = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="validation_comment", type="string", length=1024, nullable=true, options={"default"="NULL"})
     */
    private $validationComment = 'NULL';

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
     *   @ORM\JoinColumn(name="fk_parental_agreement_id", referencedColumnName="id")
     * })
     */
    private $fkParentalAgreement;

    /**
     * @var \AdherentDocument
     *
     * @ORM\ManyToOne(targetEntity="AdherentDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_certificate_licence_id", referencedColumnName="id")
     * })
     */
    private $fkCertificateLicence;

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
     * @var \FfessmLicence
     *
     * @ORM\ManyToOne(targetEntity="FfessmLicence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_ffessm_licence_id", referencedColumnName="id")
     * })
     */
    private $fkFfessmLicence;

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

    /**
     * @var \DivingTraining
     *
     * @ORM\ManyToOne(targetEntity="DivingTraining")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_actual_training_id", referencedColumnName="id")
     * })
     */
    private $fkActualTraining;

    /**
     * @var \DivingTraining
     *
     * @ORM\ManyToOne(targetEntity="DivingTraining")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_training_id", referencedColumnName="id")
     * })
     */
    private $fkTraining;

    /**
     * @var \HockeyTeam
     *
     * @ORM\ManyToOne(targetEntity="HockeyTeam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_team_id", referencedColumnName="id")
     * })
     */
    private $fkTeam;

    /**
     * @var \AdherentDocument
     *
     * @ORM\ManyToOne(targetEntity="AdherentDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_sick_note_id", referencedColumnName="id")
     * })
     */
    private $fkSickNote;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPictureAuthorisation(): ?bool
    {
        return $this->pictureAuthorisation;
    }

    public function setPictureAuthorisation(?bool $pictureAuthorisation): self
    {
        $this->pictureAuthorisation = $pictureAuthorisation;

        return $this;
    }

    public function getNeadCertificate(): ?bool
    {
        return $this->neadCertificate;
    }

    public function setNeadCertificate(?bool $neadCertificate): self
    {
        $this->neadCertificate = $neadCertificate;

        return $this;
    }

    public function getValidationStart(): ?bool
    {
        return $this->validationStart;
    }

    public function setValidationStart(?bool $validationStart): self
    {
        $this->validationStart = $validationStart;

        return $this;
    }

    public function getValidationGeneralInformations(): ?bool
    {
        return $this->validationGeneralInformations;
    }

    public function setValidationGeneralInformations(?bool $validationGeneralInformations): self
    {
        $this->validationGeneralInformations = $validationGeneralInformations;

        return $this;
    }

    public function getValidationLicence(): ?bool
    {
        return $this->validationLicence;
    }

    public function setValidationLicence(?bool $validationLicence): self
    {
        $this->validationLicence = $validationLicence;

        return $this;
    }

    public function getValidationSickNote(): ?bool
    {
        return $this->validationSickNote;
    }

    public function setValidationSickNote(?bool $validationSickNote): self
    {
        $this->validationSickNote = $validationSickNote;

        return $this;
    }

    public function getValidationParentalAgreement(): ?bool
    {
        return $this->validationParentalAgreement;
    }

    public function setValidationParentalAgreement(?bool $validationParentalAgreement): self
    {
        $this->validationParentalAgreement = $validationParentalAgreement;

        return $this;
    }

    public function getValidationPaymentTransmitted(): ?bool
    {
        return $this->validationPaymentTransmitted;
    }

    public function setValidationPaymentTransmitted(?bool $validationPaymentTransmitted): self
    {
        $this->validationPaymentTransmitted = $validationPaymentTransmitted;

        return $this;
    }

    public function getValidationPaymentCashed(): ?bool
    {
        return $this->validationPaymentCashed;
    }

    public function setValidationPaymentCashed(?bool $validationPaymentCashed): self
    {
        $this->validationPaymentCashed = $validationPaymentCashed;

        return $this;
    }

    public function getValidationComment(): ?string
    {
        return $this->validationComment;
    }

    public function setValidationComment(?string $validationComment): self
    {
        $this->validationComment = $validationComment;

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

    public function getFkParentalAgreement(): ?AdherentDocument
    {
        return $this->fkParentalAgreement;
    }

    public function setFkParentalAgreement(?AdherentDocument $fkParentalAgreement): self
    {
        $this->fkParentalAgreement = $fkParentalAgreement;

        return $this;
    }

    public function getFkCertificateLicence(): ?AdherentDocument
    {
        return $this->fkCertificateLicence;
    }

    public function setFkCertificateLicence(?AdherentDocument $fkCertificateLicence): self
    {
        $this->fkCertificateLicence = $fkCertificateLicence;

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

    public function getFkFfessmLicence(): ?FfessmLicence
    {
        return $this->fkFfessmLicence;
    }

    public function setFkFfessmLicence(?FfessmLicence $fkFfessmLicence): self
    {
        $this->fkFfessmLicence = $fkFfessmLicence;

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

    public function getFkActualTraining(): ?DivingTraining
    {
        return $this->fkActualTraining;
    }

    public function setFkActualTraining(?DivingTraining $fkActualTraining): self
    {
        $this->fkActualTraining = $fkActualTraining;

        return $this;
    }

    public function getFkTraining(): ?DivingTraining
    {
        return $this->fkTraining;
    }

    public function setFkTraining(?DivingTraining $fkTraining): self
    {
        $this->fkTraining = $fkTraining;

        return $this;
    }

    public function getFkTeam(): ?HockeyTeam
    {
        return $this->fkTeam;
    }

    public function setFkTeam(?HockeyTeam $fkTeam): self
    {
        $this->fkTeam = $fkTeam;

        return $this;
    }

    public function getFkSickNote(): ?AdherentDocument
    {
        return $this->fkSickNote;
    }

    public function setFkSickNote(?AdherentDocument $fkSickNote): self
    {
        $this->fkSickNote = $fkSickNote;

        return $this;
    }


}
