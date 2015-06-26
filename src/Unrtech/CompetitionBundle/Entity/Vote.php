<?php

namespace Unrtech\CompetitionBundle\Entity;

use Application\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Animal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\VoteRepository")
 */
class Vote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="votes")
     */
    protected $voter;

    /**
     * @var Animal
     * @ORM\ManyToOne(targetEntity="Unrtech\CompetitionBundle\Entity\CompetitionHasAnimal", inversedBy="votes")
     */
    protected $competitionHasAnimal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_vote", type="datetime")
     */
    protected $dateVote;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=2)
     */
    protected $type;

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @return User
     */
    public function getVoter() {

        return $this->voter;
    }

    /**
     * @return \DateTime
     */
    public function getDateVote() {

        return $this->dateVote;
    }

    /**
     * @return Competition
     */
    public function getCompetitionHasAnimal() {

        return $this->competitionHasAnimal;
    }

    /**
     * @return string
     */
    public function getType() {

        return $this->type;
    }

    /**
     * @param Animal $animal
     * @param User $user
     * @param Competition $competition
     * @param $type
     * @return $this
     */
    public function vote(CompetitionHasAnimal $competitionHasAnimal, User $user, $type) {
        $this->competitionHasAnimal = $competitionHasAnimal;
        $this->voter = $user;
        $this->type = $type;
        $this->dateVote = new \DateTime('now');

        return $this;
    }
}
