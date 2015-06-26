<?php

namespace Unrtech\CompetitionBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Animal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\AnimalRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"cat" = "Cat", "dog" = "Dog", "other" = "Other", "association" = "Association"})
 */
abstract class Animal
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="breed", type="string", length=255)
     */
    protected $breed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     */
    protected $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text")
     */
    protected $biography;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=2)
     */
    protected $sexe;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     */
    protected $owner;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Unrtech\CompetitionBundle\Entity\CompetitionHasAnimal", mappedBy="animal")
     */
    protected $competitionHasAnimals;

    /**
     * @var string
     * @ORM\Column(name="locale", type="string", length=2, nullable=false)
     */
    protected $locale;

    /**
     * @var Gallery
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Gallery")
     */
    protected $gallery;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Unrtech\CompetitionBundle\Entity\Vote", mappedBy="animal")
     */
    protected $votes;

    public function __construct() {
        $this->competitions = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Animal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set breed
     *
     * @param string $breed
     * @return Animal
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string 
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Animal
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return Animal
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Animal
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set owner
     *
     * @param User $owner
     * @return Animal
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param array $competitionHasAnimals
     */
    public function setCompetitionHasAnimals(array $competitionHasAnimals) {
        if (count($competitionHasAnimals) > 0) {
            foreach ($competitionHasAnimals as $element) {
                $this->addCompetitionHasAnimal($element);
            }
        }
    }

    /**
     * @param CompetitionHasAnimal $competitionHasAnimal
     * @return $this
     */
    public function addCompetitionHasAnimal(CompetitionHasAnimal $competitionHasAnimal) {
        $competitionHasAnimal->setAnimal($this);
        $this->competitionHasAnimals->add($competitionHasAnimal);
        
        return $this;
    }

    /**
     * @param CompetitionHasAnimal $competitionHasAnimal
     * @return $this
     */
    public function removeCompetitionHasAnimal(CompetitionHasAnimal $competitionHasAnimal) {
        $this->competitionHasAnimals->removeElement($competitionHasAnimal);
        
        return $this;
    }

    /**
     * @return $this
     */
    public function clearCompetitionHasAnimals() {
        $this->competitionHasAnimals->clear();
        
        return $this;
    }

    /**
     * @return string
     */
    public function getCompetitionHasAnimals() {
        return $this->competitionHasAnimals;
    }

    /**
     * @param $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param Gallery $gallery
     * @return $this
     */
    public function setGallery(Gallery $gallery) {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * @return Gallery
     */
    public function getGallery() {

        return $this->gallery;
    }

    public function setVotes(array $votes) {
        if (count($votes) > 0) {
            foreach ($votes as $element) {
                $this->addVote($element);
            }
        }
    }

    public function addVote(Vote $vote) {
        $this->votes->add($vote);

        return $this;
    }

    public function removeVote(Vote $vote) {
        $this->votes->removeElement($vote);

        return $this;
    }

    public function clearVotes() {
        $this->votes->clear();

        return $this;
    }

    public function getVotes() {
        return $this->votes;
    }

    /**
     * @return array
     */
    public function getTranslatableFields()
    {
        return array(
            'breed',
            'biography'
        );
    }

    /**
     * @return string
     */
    public function __toString() {

        return $this->name;
    }
}
