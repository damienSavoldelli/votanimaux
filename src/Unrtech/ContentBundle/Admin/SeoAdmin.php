<?php
 namespace Unrtech\ContentBundle\Admin;
 
 use Sonata\AdminBundle\Admin\Admin;
 use Sonata\AdminBundle\Datagrid\ListMapper;
 use Sonata\AdminBundle\Datagrid\DatagridMapper;
 use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of SeoAdmin
 *
 */
class SeoAdmin extends Admin {
    
    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('title', null, array(
                'required' => true,
                'label' => 'general.model.content.title'
            ))
            ->add('description', null, array(
                'required' => true,
                'label' => 'general.model.content.description'
            ))
            ->add('meta', null, array(
                'required' => true,
                'label' => 'general.model.seo.meta'
            ))
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('title', null, array('label' => 'general.model.locale.name'))
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('id')
            ->add('title', 'string', array('label' => 'general.model.content.title'))
            ->add('lang', null, array(
                'label'    => 'general.model.content.lang',
//                'template' => 'ManaCoreBundle:Back:langs.html.twig'
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
}