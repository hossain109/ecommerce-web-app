<?php

namespace App\Repository;

use App\Entity\Media1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Media1>
 *
 * @method Media1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Media1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Media1[]    findAll()
 * @method Media1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Media1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Media1::class);
    }

    public function save(Media1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Media1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}