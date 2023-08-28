<?php

namespace App\Controller\PowerPlant;

use App\Repository\PowerPlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class UpdatePowerPlantInternalIdentifierAction extends AbstractController
{
    public function __invoke(Request $request, PowerPlantRepository $powerPlantRepository)
    {
        $internalIdentifier = (string)$request->query->get('internalIdentifier', '');
        $powerPlantId = (int)$request->query->get('id', 0);

        $powerPlantRepository->updateInternalIdentifier($internalIdentifier, $powerPlantId);

        return Response::HTTP_OK;
    }
}
