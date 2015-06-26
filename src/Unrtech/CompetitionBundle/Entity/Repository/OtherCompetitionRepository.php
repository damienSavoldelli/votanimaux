<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 02/01/15
 * Time: 16:15
 */

namespace Unrtech\CompetitionBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Unrtech\CompetitionBundle\Model\Property;

class OtherCompetitionRepository extends EntityRepository {

    public function getCurrentCompetition() {
        $entities = $this->getEntityManager()->getRepository($this->_entityName)->findAll();

        $now = new \DateTime('now');
        if (count($entities) > 0) {
            foreach ($entities as $entity) {
                if ($entity->getStartPublicationDate() <= $now && $entity->getEndPublicationDate() >= $now && $entity->getStatus() === Property::CONTENT_PUBLISHED) {
                    return $entity;
                }
            }
        }

        return null;
    }
} 