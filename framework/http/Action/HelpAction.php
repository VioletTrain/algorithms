<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Entity\Result;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;
use Anso\Framework\Http\Routing\ApiRouter;
use Doctrine\ORM\EntityManager;

class HelpAction implements Action
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(Request $request): Response
    {;
        $availableRoutes = ApiRouter::getRoutes();
        $availableURIs = array_map(fn ($route) => $route['uri'], $availableRoutes);

        $result = new Result('help', implode(', ', $availableURIs));
        $this->entityManager->persist($result);
        $this->entityManager->flush();

        return new BaseResponse(['available_uris' => $availableURIs]);
    }
}