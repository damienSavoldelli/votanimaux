<?php

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CompetitionHasAnimal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\CompetitionHasAnimalRepository")
 */
class CompetitionHasAnimal
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
     * @var Animal
     * @ORM\ManyToOne(targetEntity="Unrtech\CompetitionBundle\Entity\Animal", inversedBy="competitionHasAnimals")
     */
    protected $animal;

    /**
     * @var Competition
     * @ORM\ManyToOne(targetEntity="Unrtech\CompetitionBundle\Entity\Competition", inversedBy="competitionHasAnimals")
     */
    protected $competition;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Unrtech\CompetitionBundle\Entity\Vote", mappedBy="competitionHasAnimal")
     */
    protected $votes;

    /**
     *
     */
    public function __construct() {
        $this->votes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param array $votes
     */
    public function setVotes(array $votes) {
        if (count($votes) > 0) {
            foreach ($votes as $element) {
                $this->addVote($element);
            }
        }
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

    /**
     * @param Competition $competition
     * @return $this
     */
    public function setCompetition(Competition $competition) {
        $this->competition = $competition;

        return $this;
    }

    /**
     * @return Competition
     */
    public function getCompetition() {

        return $this->competition;
    }

    /**
     * @param Vote $vote
     * @return $this
     */
    public function addVote(Vote $vote) {
        $this->votes->add($vote);

        return $this;
    }

    /**
     * @param Vote $vote
     * @return $this
     */
    public function removeVote(Vote $vote) {
        $this->votes->removeElement($vote);

        return $this;
    }

    /**
     * @return $this
     */
    public function clearVotes() {
        $this->votes->clear();

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getVotes() {
        return $this->votes;
    }
}
