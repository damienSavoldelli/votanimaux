<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 02/01/15
 * Time: 16:15
 */

namespace Unrtech\ContentBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Unrtech\ContentBundle\Model\Property;

class ArticleRepository extends EntityRepository {

    /**
     * @return array
     */
    public function getAllActive() {
        $now = new \DateTime('now');
        $qb = $this->getEntityManager()->getRepository('UnrtechContentBundle:Article')->createQueryBuilder('a');

        $query = $qb->where(
            $qb->expr()->andX(
                $qb->expr()->orX(
                    $qb->expr()->gte('a.startPublicationDate', $now->getTimestamp()),
                    $qb->expr()->isNull('a.startPublicationDate')
                ),
                $qb->expr()->orX(
                    $qb->expr()->lte('a.endPublicationDate', $now->getTimestamp()),
                    $qb->expr()->isNull('a.endPublicationDate')
                ),
                $qb->expr()->eq('a.status', Property::CONTENT_PUBLISHED)
            )
        )->getQuery();

        return $query->getResult();
    }
} 