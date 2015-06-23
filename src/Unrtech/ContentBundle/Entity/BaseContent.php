<?php

namespace Unrtech\ContentBundle\Entity;

use Application\Sonata\ClassificationBundle\Entity\Category;
use Application\Sonata\ClassificationBundle\Entity\Tag;
use Application\Sonata\MediaBundle\Entity\Media;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Unrtech\ContentBundle\Model\ContentInterface;

/**
 * BaseContent
 *
 * @ORM\Table(name="base_content")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "article" = "Article"
 * })
 */
abstract class BaseContent implements ContentInterface
{
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
     * @var ManaUserBase
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     */
    protected $author;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    protected $lastUpdate;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $startPublicationDate;

    /**
     * @var DateTime
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
     * @var
     */
    protected $filters;

    public function __construct() {
        $this->tags = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
    public function setStartPublicationDate($startDate = null) {
        if ($startDate instanceof \DateTime) {
            $this->startPublicationDate = $startDate;
        }

        return $this;
    }

    /**
     * @return D\ateTime
     */
    public function getStartPublicationDate() {

        return $this->startPublicationDate;
    }

    /**
     * @param \DateTime $endDate
     * @return $this
     */
    public function setEndPublicationDate($endDate = null) {
        if ($endDate instanceof \DateTime) {
            $this->endPublicationDate = $endDate;
        }

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
     * @return string
     */
    public function __toString() {

        return $this->title;
    }
}
