<?php

namespace App\Repository;

use App\Entity\PowerPlant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PowerPlantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PowerPlant::class);
    }

    public function updateInternalIdentifier(string $internalIdentifier, int $powerPlantId): void
    {
        $this->getEntityManager()->getConnection()->executeQuery(
            sprintf(
                'UPDATE power_plant SET internalIdentifier=%s WHERE id=%s',
                $internalIdentifier,
                $powerPlantId
            )
        );
    }
}
