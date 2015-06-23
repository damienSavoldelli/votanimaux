<?php

namespace Unrtech\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Description of Content
 *
 * @author jeremy
 * @ORM\Entity(repositoryClass="Unrtech\ContentBundle\Entity\Repository\ArticleRepository")
 * @ORM\Table(name="article")
 */
class Article extends BaseContent {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var array
     * @JMS\Exclude()
     */
    protected $filters = array(
       array('field' => 'categories', 'type' => 'choice', 'choices' => 'categoriesChoice', 'label' => 'general.model.event.category')
    );

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    public function getName()
    {
        return 'UnrtechContentBundle:Article';
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
