<?php

namespace Unrtech\ContentBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;

/**
 * Description of ContentAdmin
 *
 * @author lionel
 */
class ContentAdmin extends Admin
{
    protected $locale;

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('featuredPicture', null, array('template' => 'UnrtechContentBundle:Back:picture.html.twig'))
            ->add('title', null, array('label' => 'general.model.content.title'))
            ->add('status', null, array(
                'label'    => 'general.model.content.status',
                'template' => 'UnrtechContentBundle:Back:status_display.html.twig'
            ))
            ->add('tags', null)
            ->add('categories', null)
            ->add('startPublicationDate', null, array(
                'label'              => 'general.model.content.start_publication',
                'translation_domain' => 'UnrtechContentBundle',
            ))
            ->add('endPublicationDate', null, array(
                'label'              => 'general.model.content.end_publication',
                'translation_domain' => 'UnrtechContentBundle',
            ))
            ->add('lastUpdate', 'datetime', array(
                'label'              => 'general.model.content.last_update',
                'translation_domain' => 'UnrtechContentBundle',
            ))
            ->add('lang', null, array(
                'label'    => 'general.model.content.lang',
                'template' => 'UnrtechContentBundle:Back:langs.html.twig'
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

        $formMapper
            ->tab('Général')
                ->add('featuredPicture', 'sonata_type_picture_model_list', array(
                    'label'              => 'model.label.featured_picture',
                    'translation_domain' => 'UnrtechContentBundle',
                    'required'           => false,
                    'sonata_admin'       => 'sonata.media.admin.media',
                    'model_manager'      => $this->getModelManager(),
                    'attr'               => array(
                        'class' => 'columnable'
                    )
                ))
                ->add('startPublicationDate', 'sonata_type_datetime_picker', array(
                    'label'              => 'general.model.content.start_publication',
                    'translation_domain' => 'UnrtechContentBundle',
                    'required'           => false,
                    'dp_side_by_side'       => true,
                    'dp_use_current'        => false,
                    'dp_use_seconds'        => false,
                    'date_format'           => 'dd/MM/yyyy HH:mm',
                    'format'                => 'dd/MM/yyyy HH:mm',
                ))
                ->add('endPublicationDate', 'sonata_type_datetime_picker', array(
                    'label'              => 'general.model.content.end_publication',
                    'translation_domain' => 'UnrtechContentBundle',
                    'required'           => false,
                    'dp_side_by_side'    => true,
                    'dp_use_current'     => false,
                    'dp_use_seconds'     => false,
                    'date_format'        => 'dd/MM/yyyy HH:mm',
                    'format'             => 'dd/MM/yyyy HH:mm',
                ))
                ->add('title', 'text', array(
                    'label'              => 'general.model.content.title',
                    'translation_domain' => 'UnrtechContentBundle',
                    'required'           => true,
                    'attr'               => array(
                        'class'           => 'input-title input-lg col-xs-12',
                        'data-count-char' => $this->configurationPool->getContainer()->get('translator')->trans('general.model.content.char_count_msg', [], 'admin'),
                    )
                ))
                ->add('excerpt', 'textarea', array(
                    'attr'               => array('class' => ''),
                    'label'              => 'general.model.content.excerpt',
                    'translation_domain' => 'UnrtechContentBundle',
                    'required'           => true,
                    'attr'               => array(
                        'data-count-char' => $this->configurationPool->getContainer()->get('translator')->trans('general.model.content.char_count_msg', [], 'admin'),
                    )
                ))
                ->add('content', 'ckeditor', array(
                    'attr'               => array('class' => 'tinymce'),
                    'label'              => 'general.model.content.content',
                    'translation_domain' => 'UnrtechContentBundle',
                    'required'           => false,
                ))
                ->add('categories', 'sonata_type_model', array(
                    'class' => 'UnrtechContentBundle:Category',
                    'label'              => 'general.block.categories',
                    'translation_domain' => 'UnrtechContentBundle',
                    'multiple' => true,
                    'required' => false,
                    'attr'               => array(
                        'class' => 'columnable',
                    )
                ))
                ->add('tags', 'sonata_type_model', array(
                    'class' => 'UnrtechContentBundle:Tag',
                    'label'              => 'general.block.tags',
                    'translation_domain' => 'UnrtechContentBundle',
                    'multiple' => true,
                    'required' => false,
                    'attr'               => array(
                        'class' => 'columnable',
                    )
                ))
                ->add('status', 'choice', array(
                    'required' => false,
                    'choices' => [],
                    'attr'     => array(
                        'class'   => 'status-current columnable',
                        'data-id' => 'status-current'
                    )
                ))
                ->end()
            ->end()
            ->tab('SEO')
                ->add('seo', 'sonata_type_model_list', array(
                    'sonata_admin' => 'mana.admin.seo'
                ))
            //@TODO Make SEO admin
//            ->add('seoPreview', 'hidden', array(
//                'label'              => 'general.model.content.seo_preview',
//                'translation_domain' => 'UnrtechContentBundle',
//                'required'           => false,
//                'attr'               => array(
//                    'class' => 'preview-google col-xs-12'
//                )))
//            ->add('seoTitle', 'text', array(
//                'label'              => 'general.model.content.seo_title',
//                'translation_domain' => 'UnrtechContentBundle',
//                'required'           => false,
//                'attr'               => array(
//                    'class' => 'input-seo-title input-lg col-xs-12'
//                )))
//            ->add('seoDescription', 'textarea', array(
//                'label'              => 'general.model.content.seo_description',
//                'translation_domain' => 'UnrtechContentBundle',
//                'required'           => false,
//                'attr'               => array(
//                    'class' => 'input-seo-description col-xs-12'
//                )))
//            ->add('seoMeta', 'text', array(
//                'label'              => 'general.model.content.seo_meta',
//                'translation_domain' => 'UnrtechContentBundle',
//                'required'           => false,
//                'attr'               => array(
//                    'class' => 'input-seo-keyword input-lg col-xs-12'
//                )))

            ->end();

        return $formMapper;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array(
                'label' => 'general.model.content.title'
            ))
            ->add('status', null, array(), 'choice', array(
                'choices' => []
            ));
    }

    /**
     * @param \Knp\Menu\ItemInterface                  $menu
     * @param                                          $action
     * @param \Sonata\AdminBundle\Admin\AdminInterface $childAdmin
     */
    public function configureSideMenu(\Knp\Menu\ItemInterface $menu, $action, \Sonata\AdminBundle\Admin\AdminInterface $childAdmin = null){
        if (!$childAdmin && !in_array($action, array('edit', 'create'))) {
            return;
        }
        $menu->addChild(' ', array());
    }

    /**
     * @param mixed $object
     */
    public function prePersist($object)
    {
        $object = parent::prePersist($object);

        $object->setAuthor($this->getConfigurationPool()->getContainer()->get('mana.helper')->getCurrentUser());
        $object->setLastUpdate(new \DateTime('now'));
    }

    /**
     * @param mixed $object
     */
    public function preUpdate($object)
    {
        $object = parent::preUpdate($object);
        if (Property::CONTENT_PUBLISHED === $object->getStatus()) {
            $object->undeleteToPublish();
        }
        if (Property::CONTENT_PENDING === $object->getStatus()) {
            $object->undelete();
        }

        $object->setAuthor($this->getConfigurationPool()->getContainer()->get('mana.helper')->getCurrentUser());
        $object->setLastUpdate(new \DateTime('now'));
    }

    /**
     * overide export formats to hide it
     *
     * @return array
     */
    public function getExportFormats()
    {
        return array();
    }
}
