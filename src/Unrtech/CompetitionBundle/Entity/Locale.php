<?php

namespace Unrtech\CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locale
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Unrtech\CompetitionBundle\Entity\Repository\LocaleRepository")
 */
class Locale
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
     *
     * @ORM\Column(name="code", type="string", length=6)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="money", type="string", length=5)
     */
    private $money;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFormat", type="string", length=25)
     */
    private $dateFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=50)
     */
    private $logo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


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
     * Set code
     *
     * @param string $code
     * @return Locale
     */
    public function setCode($code)
    {
        $this->code = $code;
        $this->logo = 'bundles/i18n/image/locales/'.$code.'.png';

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set money
     *
     * @param string $money
     * @return Locale
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string 
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set dateFormat
     *
     * @param string $dateFormat
     * @return Locale
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * Get dateFormat
     *
     * @return string 
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Locale
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
    
    public function setLogo($logo) {
        $this->logo = $logo;
        
        return $this;
    }
    
    public function getLogo() {
        
        return $this->logo;
    }
    
    public function setActive($active) {
        $this->active = $active;
        
        return $this;
    }
    
    public function getActive() {
        
        return $this->active;
    }
    
    public function __toString() {
        
        return $this->name;
    }
}
