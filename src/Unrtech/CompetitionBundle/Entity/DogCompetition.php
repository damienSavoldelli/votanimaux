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
 * Class DogCompetition
 * @package Unrtech\CompetitionBundle\Entity
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\DogCompetitionRepository")
 * @ORM\Table(name="DogCompetition")
 */
class DogCompetition extends Competition {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, length=50)
     */
    protected $category = 'competition.dog';

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @return string
     */
    public function getCategory() {

        return 'competition.dog';
    }

    public function getTranslatableFields()
    {
        return array(
            'title',
            'excerpt',
            'content'
        );
    }
} 