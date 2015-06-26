<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 01/01/15
 * Time: 02:51
 */

namespace Unrtech\CompetitionBundle\Entity;

use Application\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package Unrtech\CompetitionBundle\Entity
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\CommentRepository")
 * @ORM\Table()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "animal_comment"         = "AnimalComment"
 * })
 */
abstract class Comment {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     */
    protected $author;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $creationDate;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, length=20)
     */
    protected $status;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     */
    protected $moderator;

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @param User $author
     * @return $this
     */
    public function setAuthor(User $author) {
        $this->author = $author;

        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor() {

        return $this->author;
    }

    /**
     * @param $date
     * @return $this
     */
    public function setCreationDate($date) {
        $this->creationDate = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate() {

        return $this->creationDate;
    }

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus() {

        return $this->status;
    }

    /**
     * @param User $moderator
     * @return $this
     */
    public function setModerator(User $moderator) {
        $this->moderator = $moderator;

        return $this;
    }

    /**
     * @return User
     */
    public function getModerator() {

        return $this->moderator;
    }
}