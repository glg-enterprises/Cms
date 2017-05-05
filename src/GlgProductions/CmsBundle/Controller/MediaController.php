<?php

namespace GlgProductions\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MediaController extends Controller
{
    /**
     * @Route("/gallery")
     */
    public function GalleryAction()
    {
        return $this->render('CmsBundle:Media:gallery.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/media/upload")
     */
    public function UploadAction()
    {
        return $this->render('CmsBundle:Media:upload.html.twig', array(
            // ...
        ));
    }

}
