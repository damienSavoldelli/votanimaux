<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 01/01/15
 * Time: 02:51
 */

namespace Unrtech\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ArticleComment
 * @package Unrtech\ContentBundle\Entity
 * @ORM\Entity(repositoryClass="Unrtech\ContentBundle\Entity\Repository\CommentRepository")
 * @ORM\Table()
 */
class ArticleComment {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Animal
     * @ORM\ManyToOne(targetEntity="Unrtech\ContentBundle\Entity\Article", inversedBy="comments")
     */
    protected $article;

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @param Article $animal
     * @return $this
     */
    public function setArticle(Article $article) {
        $this->article = $article;

        return $this;
    }

    /**
     * @return Article
     */
    public function getArticle() {

        return $this->article;
    }
}