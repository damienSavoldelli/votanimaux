<?php
/**
 * Created by PhpStorm.
 * User: dj3
 * Date: 26/06/15
 * Time: 12:01
 */

namespace Unrtech\ContentBundle\Helper;


use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Translation\Translator;

class AdminHelper {
    /**
     * @var EntityManager
     */
    protected $_om;

    /**
     * @var TokenStorageInterface
     */
    protected $storage;

    /**
     * @var Translator
     */
    protected $translator;
    
    public function __construct(EntityManager $_om, TokenStorageInterface $storage, Translator $translator) {
        $this->_om = $_om;
        $this->storage = $storage;
        $this->translator = $translator;
    }
    
    public function getStatusChoices($locale = 'fr')
    {
        $choices = array(
            'draft'     => $this->translator->trans('status.draft', [], 'admin'),
            'pending'   => $this->translator->trans('status.pending', [], 'admin'),
            'published' => $this->translator->trans('status.published', [], 'admin'),
            
        );
        if (in_array('ROLE_ADMIN', $this->storage->getToken()->getUser()->getRoles())) {
            $choices['deleted'] = $this->translator->trans('status.deleted', [], 'admin');
        }
        asort($choices);

        return $choices;
    }
} 