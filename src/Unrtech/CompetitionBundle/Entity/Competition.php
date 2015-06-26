<?php

namespace Unrtech\CompetitionBundle\Entity;

use Application\Sonata\ClassificationBundle\Entity\Category;
use Application\Sonata\ClassificationBundle\Entity\Tag;
use Application\Sonata\MediaBundle\Entity\Media;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Unrtech\CompetitionBundle\Model\ContentInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Unrtech\ContentBundle\Entity\Seo;


/**
 * Description of Competition
 *
 * @author dj3
 * @ORM\Entity()
 * @ORM\Table(name="competition")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "cat_competition"         = "CatCompetition",
 *      "dog_competition"         = "DogCompetition",
 *      "other_competition"       = "OtherCompetition",
 *      "association_competition" = "AssociationCompetition"
 * })
 */
abstract class Competition implements ContentInterface {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, length=2)
     */
    protected $locale;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $status;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $excerpt;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $content;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     */
    protected $author;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $lastUpdate;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $startPublicationDate;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $endPublicationDate;

    /**
     * @var Seo
     * @ORM\ManyToOne(targetEntity="Unrtech\ContentBundle\Entity\Seo")
     */
    protected $seo;

    /**
     * @var Media
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     */
    protected $featuredPicture;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Application\Sonata\ClassificationBundle\Entity\Tag")
     */
    protected $tags;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Application\Sonata\ClassificationBundle\Entity\Category")
     */
    protected $categories;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $firstReward = 0;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $secondReward;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $thirdReward;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fourToTenReward;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="competitions")
     */
    protected $winners;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Unrtech\CompetitionBundle\Entity\CompetitionHasAnimal", mappedBy="competition")
     */
    protected $competitionHasAnimals;

    /**
     * @var array
     */
    protected $filters = array(
        array('field' => 'start_date', 'type' => 'text', 'class' => 'form-datepicker', 'label' => 'general.model.competition.start_date'),
        array('field' => 'end_date', 'type' => 'text', 'class' => 'form-datepicker', 'label' => 'general.model.competition.end_date'),
    );

    /**
     *
     */
    public function __construct() {
        $this->winners = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->competitionHasAnimals = new ArrayCollection();
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
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale) {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale() {

        return $this->locale;
    }

    /**
     * @param string $status
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
     * @param $title
     * @return $this
     */
    public function setTitle ($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() {

        return $this->title;
    }

    /**
     * @param $excerpt
     * @return $this
     */
    public function setExcerpt($excerpt) {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * @return string
     */
    public function getExcerpt() {

        return $this->excerpt;
    }

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent() {

        return $this->content;
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
     * @param \DateTime $lastUpdate
     * @return $this
     */
    public function setLastUpdate(\DateTime $lastUpdate) {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdate() {

        return $this->lastUpdate;
    }

    /**
     * @param \DateTime $startDate
     * @return $this
     */
    public function setStartPublicationDate(\DateTime $startDate = null) {
        $this->startPublicationDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartPublicationDate() {

        return $this->startPublicationDate;
    }

    /**
     * @param \DateTime $endDate
     * @return $this
     */
    public function setEndPublicationDate(\DateTime $endDate = null) {
        $this->endPublicationDate = $endDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndPublicationDate() {

        return $this->endPublicationDate;
    }

    /**
     * @param Seo $seo
     * @return $this
     */
    public function setSeo(Seo $seo) {
        $this->seo = $seo;

        return $this;
    }

    /**
     * @return Seo
     */
    public function getSeo() {

        return $this->seo;
    }

    /**
     * @param Media $media
     * @return $this
     */
    public function setFeaturedPicture(Media $media) {
        $this->featuredPicture = $media;

        return $this;
    }

    /**
     * @return Media
     */
    public function getFeaturedPicture() {

        return $this->featuredPicture;
    }

    /**
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags) {
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                $this->addTag($tag);
            }
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag) {
        $this->tags->add($tag);

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag) {
        $this->tags->add($tag);

        return $this;
    }

    /**
     * @return $this
     */
    public function clearTags() {
        $this->tags->clear();

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags() {

        return $this->tags;
    }

    /**
     * @param array $categories
     * @return $this
     */
    public function setCategories(array $categories) {
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                $this->addCategory($category);
            }
        }

        return $this;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category) {
        $this->categories->add($category);

        return $this;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function removeCategory(Category $category) {
        $this->categories->add($category);

        return $this;
    }

    /**
     * @return $this
     */
    public function clearCategories() {
        $this->categories->clear();

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategories() {

        return $this->categories;
    }

    /**
     * @param $reward
     * @return $this
     */
    public function setFirstReward($reward) {
        $this->firstReward = $reward;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstReward() {

        return $this->firstReward;
    }

    /**
     * @param $reward
     * @return $this
     */
    public function setSecondReward($reward) {
        $this->secondReward = $reward;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecondReward() {

        return $this->secondReward;
    }

    /**
     * @param $reward
     * @return $this
     */
    public function setThirdReward($reward) {
        $this->thirdReward = $reward;

        return $this;
    }

    /**
     * @return string
     */
    public function getThirdReward() {

        return $this->thirdReward;
    }


    /**
     * @param $reward
     * @return $this
     */
    public function setFourToTenReward($reward) {
        $this->fourToTenReward = $reward;

        return $this;
    }

    /**
     * @return string
     */
    public function getFourToTenReward() {

        return $this->fourToTenReward;
    }

    /**
     * @param array $winners
     */
    public function setWinners(array $winners) {
        if (count($winners) > 0) {
            foreach ($winners as $element) {
                $this->addWinner($element);
            }
        }
    }

    /**
     * @param User $winner
     * @return $this
     */
    public function addWinner(User $winner) {
        $this->winners->add($winner);

        return $this;
    }

    /**
     * @param User $winner
     * @return $this
     */
    public function removeWinner(User $winner) {
        $this->winners->removeElement($winner);

        return $this;
    }

    /**
     * @return $this
     */
    public function clearWinners() {
        $this->winners->clear();

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getWinners() {
        return $this->winners;
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
        $competitionHasAnimal->setCompetition($this);
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
     * @return ArrayCollection
     */
    public function getCompetitionHasAnimals() {
        return $this->competitionHasAnimals;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'UnrtechCompetitionBundle:Competition';
    }

    /**
     * @return string
     */
    public function __toString() {

        return $this->title;
    }
}
