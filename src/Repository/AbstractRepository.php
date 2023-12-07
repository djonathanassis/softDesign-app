<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AbstractRepository extends ServiceEntityRepository implements RepositoryInterface
{
    protected string $entityClass;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->entityClass);
    }

    public function save(object $entity = null, bool $persist = false): void
    {
        if (!$persist && $entity !== null) {
            $this->getEntityManager()->persist($entity);
        }

        $this->getEntityManager()->flush();
    }

    public function remove(object $entity = null, bool $persist = false): void
    {
        if (!$persist && $entity !== null) {
            $this->getEntityManager()->remove($entity);
        }

        $this->getEntityManager()->flush();
    }

}