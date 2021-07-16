<?php


namespace App\dataPersister;


use App\Entity\RequireInsurance;
use Doctrine\ORM\EntityManagerInterface;

class RequireInsurancePersister
{
    protected $em;

    /**
     * RequireInsurancePersister constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        return $data instanceof RequireInsurance;
    }

    public function persist($data)
    {
        $data->setCreatedon(new \DateTime());
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}