<?php

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dog
 *
 * @ORM\Table(name="animal_dog")
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\AnimalRepository")
 */
class Dog extends Animal
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
