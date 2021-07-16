<?php


namespace App\dataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\DivingTraining;
use Doctrine\ORM\EntityManagerInterface;

class DivingTrainingPersister implements DataPersisterInterface
{
    protected $em;
    /**
     * AdherentDocument constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        return $data instanceof DivingTraining;
    }

    public function persist($data){
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