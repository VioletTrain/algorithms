<?php

namespace Algorithms\Entity;

use Doctrine\ORM\EntityManagerInterface;

class ResultManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Result $result
     */
    public function saveResult(Result $result)
    {
        $this->em->persist($result);
        $this->em->flush();
    }
}