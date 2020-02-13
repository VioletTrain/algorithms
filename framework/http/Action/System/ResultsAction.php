<?php

namespace Anso\Framework\Http\Action\System;

use Algorithms\Entity\Result;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
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

        return new BaseResponse(['results' => new ResultResource($results)]);
    }
}