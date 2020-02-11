<?php

namespace Algorithms\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="result")
 */
class Result
{
    /**
     * @Column(type="integer") @GeneratedValue()
     * @Id
     */
    private $id;

    /** @Column(type="string") */
    private $useCaseName;

    /** @Column(type="string") */
    private $result;

//    /**
//     * @Column(type="datetime")
//     */
//    private $created_at;

    /**
     * Result constructor.
     * @param string $useCaseName
     * @param string $result
     */
    public function __construct(string $useCaseName, string $result)
    {
        $this->useCaseName = $useCaseName;
        $this->result = $result;
    }

}