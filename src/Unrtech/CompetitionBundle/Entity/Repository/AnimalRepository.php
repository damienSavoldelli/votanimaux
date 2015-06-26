<?php

namespace Unrtech\CompetitionBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AnimalRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnimalRepository extends EntityRepository
{
    public function findPaginated($page, $limit) {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->orderBy('a.votes', 'desc');
        $qb
            ->setMaxResults($limit)
            ->setFirstResult($page);

        return $qb->getQuery()->getResult();
    }
}