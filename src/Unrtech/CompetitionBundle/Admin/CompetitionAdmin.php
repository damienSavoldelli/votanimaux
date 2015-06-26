<?php

namespace Unrtech\CompetitionBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Unrtech\ContentBundle\Admin\ContentAdmin;

/**
 * Description of ContentAdmin
 *
 * @author jeremy
 */
class CompetitionAdmin extends ContentAdmin {

    public function configureFormFields(FormMapper $formMapper) {
        parent::configureFormFields($formMapper);

        $formMapper
            ->end()
            ->tab('Général')
                ->add('secondReward', 'money', array(
                    'required'           => true,
                    'label'              => 'general.model.content.second_reward',
                    'translation_domain' => 'competition',
                    'attr'               => array(
                        'class' => 'span4'
                    )
                ))
                ->add('thirdReward', 'money', array(
                    'required'           => true,
                    'label'              => 'general.model.content.third_reward',
                    'translation_domain' => 'competition',
                    'attr'               => array(
                        'class' => 'span4'
                    )
                ))
                ->add('fourToTenReward', 'money', array(
                    'required'           => false,
                    'label'              => 'general.model.content.four_to_ten_reward',
                    'translation_domain' => 'competition',
                    'attr'               => array(
                        'class' => 'span4'
                    )
                ))
            ->end()
        ;
    }
}
