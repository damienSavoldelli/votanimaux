<?php

namespace Unrtech\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends Controller
{
    /**
     * @Route("/admin/media/render/{id}", name="admin_render_media", options={"expose"=true})
     */
    public function adminMediaAction($id)
    {
        $media = $this
            ->get('doctrine.orm.default_entity_manager')
            ->getRepository('ApplicationSonataMediaBundle:Media')
            ->find($id);

        return $this->render('@UnrtechContent/Admin/media_render.html.twig', array(
            'media' => $media
        ));
    }

    /**
     * @Route("/admin/picture/render/{id}", name="path_render_thumb")
     */
    public function pictureAction($id) {

        return $this->render('UnrtechContentBundle:Admin:display_picture.html.twig', array(
            'media' => $this->get('doctrine.orm.default_entity_manager')->getRepository('ApplicationSonataMediaBundle:Media')->find($id)
        ));
    }

    /**
     * @Route("/admin/pictures/render/{id}", name="path_render_gallery")
     */
    public function picturesAction($id) {

        return $this->render('UnrtechContentBundle:Admin:display_pictures.html.twig', array(
            'gallery' => $this->get('doctrine.orm.default_entity_manager')->getRepository('ApplicationSonataMediaBundle:Gallery')->find($id)
        ));
    }
}
