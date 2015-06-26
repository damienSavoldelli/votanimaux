<?php

namespace Unrtech\CompetitionBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;

/**
 * Description of AnimalAdmin
 *
 * @author jeremy
 */
class AnimalAdmin extends Admin
{
    protected $locale;

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('pictures', null, array('label' => 'general.model.animal.pictures', 'translation_domain' => 'competition', 'template' => 'UnrtechContentBundle:Admin:picture.html.twig'))
            ->add('name', null, array('label' => 'general.model.animal.name', 'translation_domain' => 'competition',))
            ->add('breed', null, array('label' => 'general.model.animal.breed', 'translation_domain' => 'competition',))
            ->add('sexe', null, array('label' => 'general.model.animal.sexe', 'template' => 'UnrtechCompetitionBundle:Back:sexe.html.twig'))
            ->add('lang', null, array(
                'label'    => 'general.model.content.lang',
                'translation_domain' => 'competition',
            ));
    }

    /**
     * @param FormMapper $formMapper
     *
     * @return FormMapper|void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

//        $this->locale = $this
//            ->getConfigurationPool()
//            ->getContainer()
//            ->get('doctrine.orm.default_entity_manager')
//            ->getRepository('competition:Locale')
//            ->findOneBy(array('code' => $this->locale));

        $formMapper
            ->tab('Général')
                ->add('gallery', 'sonata_type_picture_model_list', array(
                    'label'              => 'general.model.animal.gallery',
                    'translation_domain' => 'competition',
                    'required'           => false,
                    'sonata_admin'       => 'sonata.media.admin.gallery',
                    'model_manager'      => $this->getModelManager()
                ))
            ->add('name', 'text', array(
                'label'              => 'general.model.animal.name',
                'translation_domain' => 'competition',
                'required'           => true,
                'attr'               => array(
                    'class'           => 'input-title input-lg col-xs-12',
                )
            ))
            ->add('breed', 'text', array(
                'label'              => 'general.model.animal.breed',
                'translation_domain' => 'competition',
                'required'           => true,
                'attr'               => array(
                    'class'           => 'input-title input-lg col-xs-12',
                )
            ))
            ->add('birthdate', 'sonata_type_datetime_picker', array(
                'label'              => 'general.model.animal.birthdate',
                'translation_domain' => 'competition',
                'required'           => true,
                'dp_side_by_side'       => false,
                'dp_use_current'        => false,
                'dp_use_seconds'        => false,
                'date_format'           => 'dd/MM/yyyy',
                'format'                => 'dd/MM/yyyy',
                'attr'                  => array(
                    'class' => 'input-sm col-xs-2',
                )
            ))
            ->add('biography', 'textarea', array(
                'label'              => 'general.model.animal.biography',
                'translation_domain' => 'competition',
                'attr'               => array(
                    'class' => 'input-lg col-xs-12',
                )
            ))
            ->add('owner', 'entity', array(
                'label' => 'general.model.animal.owner',
                'class' => 'ApplicationSonataUserBundle:User'
            ))
            ->add('sexe', 'choice', array(
                'label' => 'general.model.animal.sexe',
                'choices' => array(
                    'm' => 'general.model.animal.male',
                    'f' => 'general.model.animal.female'
                )
            ))
            ->end()
            ;

        return $formMapper;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array(
                'label' => 'general.model.animal.name',
                'translation_domain' => 'competition',
            ))
            ->add('sexe', null, array(), 'choice', array(
                'translation_domain' => 'competition',
                'choices' => array(
                    'm' => 'general.model.animal.male',
                    'f' => 'general.model.animal.female'
                )
            ));
    }

    /**
     * @param mixed $object
     */
    public function prePersist($object)
    {
        $object = parent::prePersist($object);
    }

    /**
     * @param mixed $object
     */
    public function preUpdate($object)
    {
        $object = parent::preUpdate($object);
    }
}
