<?php


namespace App\dataPersister;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Account;
use Doctrine\ORM\EntityManagerInterface;

class AccountPersister implements DataPersisterInterface
{
    protected $em;

    /**
     * FfessmLicencePersister constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        return $data instanceof Account;
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