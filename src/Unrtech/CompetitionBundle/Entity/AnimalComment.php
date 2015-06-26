<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 01/01/15
 * Time: 02:51
 */

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AnimalComment
 * @package Unrtech\CompetitionBundle\Entity
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\CommentRepository")
 * @ORM\Table()
 */
class AnimalComment {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Animal
     * @ORM\ManyToOne(targetEntity="Unrtech\CompetitionBundle\Entity\Animal", inversedBy="comments")
     */
    protected $animal;

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @param Animal $animal
     * @return $this
     */
    public function setAnimal(Animal $animal) {
        $this->animal = $animal;

        return $this;
    }

    /**
     * @return Animal
     */
    public function getAnimal() {

        return $this->animal;
    }
}