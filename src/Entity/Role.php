<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 * @ApiResource(
 *  collectionOperations={ "get", "post"},
 *  attributes={ "input_formats"={"json"={"application/json"}}, "output_formats"={"json"={"application/json"}}})
 */
class Role
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
     * @ORM\Column(name="code", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $code = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $createdon = 'current_timestamp()';


}
