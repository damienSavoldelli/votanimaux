<?php

namespace Unrtech\ContentBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of ContentAdmin
 *
 * @author jeremy
 */
class ArticleAdmin extends ContentAdmin {

    public function configureFormFields(FormMapper $formMapper) {
        return parent::configureFormFields($formMapper);
    }
}
