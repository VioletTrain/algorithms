<?php

namespace Algorithms\Entity;

use Anso\Framework\Base\BaseEntity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="result")
 */
class Result extends BaseEntity
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

    /**
     * Result constructor.
     * @param string $useCaseName
     * @param string $result
     */
    public function __construct(string $useCaseName, string $result)
    {
        parent::__construct();
        $this->useCaseName = $useCaseName;
        $this->result = $result;
    }

    public function getName(): string
    {
        return $this->useCaseName;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}