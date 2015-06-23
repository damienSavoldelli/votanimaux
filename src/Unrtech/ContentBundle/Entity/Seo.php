<?php

namespace Unrtech\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mana\Bundle\I18NBundle\Model\TranslatableEntityInterface;

/**
 * Seo
 *
 * @ORM\Table(name="seo")
 * @ORM\Entity(repositoryClass="Unrtech\ContentBundle\Entity\Repository\SeoRepository")
 */
class Seo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $locale;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $meta;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $preview;
    
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
     * @param $title
     * @return $this
     */
    public function setTitle($title) {
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
     * @param $description
     * @return $this
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() {

        return $this->description;
    }

    /**
     * @param $meta
     * @return $this
     */
    public function setMeta($meta) {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return string
     */
    public function getMeta() {

        return $this->meta;
    }

    /**
     * @param $preview
     * @return $this
     */
    public function setPreview($preview) {
        $this->preview = $preview;

        return $this;
    }

    /**
     * @return string
     */
    public function getPreview() {

        return $this->preview;
    }

    /**
     * @return array
     */
    public function getTranslatableFields()
    {
        return array(
            'title',
            'description',
            'meta'
        );
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
     * @return string
     */
    public function __toString() {

        return $this->title;
    }
}
