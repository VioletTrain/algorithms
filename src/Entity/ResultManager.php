<?php

namespace Algorithms\Entity;

use Doctrine\ORM\EntityManager;

class ResultManager
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param Result $result
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveResult(Result $result)
    {
        $this->em->persist($result);
        $this->em->flush();
    }
}