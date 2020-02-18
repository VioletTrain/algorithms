<?php

namespace Algorithms\Http\System;

use Algorithms\Entity\Result;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;
use Anso\Framework\Http\Resource\ResultResource;
use Doctrine\ORM\EntityManager;

class ResultsAction implements Action
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(Request $request): Response
    {
        $useCaseName = $request->get('name');
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('r')
            ->from(Result::class, 'r');

        if ($useCaseName) {
            $queryBuilder->andWhere('r.useCaseName = :name')
                ->setParameter('name', $useCaseName);
        }

        $results = $queryBuilder->getQuery()->getResult();

        return new Response(['results' => new ResultResource($results)]);
    }
}