<?php

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Other
 *
 * @ORM\Table(name="animal_other")
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\AnimalRepository")
 */
class Other extends Animal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
