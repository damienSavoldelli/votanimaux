<?php

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cat
 *
 * @ORM\Table(name="animal_cat")
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\AnimalRepository")
 */
class Cat extends Animal
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
