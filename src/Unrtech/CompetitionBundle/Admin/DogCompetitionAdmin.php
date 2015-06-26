<?php

namespace Unrtech\CompetitionBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of ContentAdmin
 *
 * @author jeremy
 */
class DogCompetitionAdmin extends CompetitionAdmin {

    public function configureFormFields(FormMapper $formMapper) {
        return parent::configureFormFields($formMapper);
    }
}
