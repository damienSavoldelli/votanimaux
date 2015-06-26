<?php

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Association
 *
 * @ORM\Table(name="animal_association")
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\AnimalRepository")
 */
class Association extends Animal
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
