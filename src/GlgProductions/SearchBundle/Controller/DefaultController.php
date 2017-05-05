<?php

namespace GlgProductions\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\I18nRoutingBundle\Routing\Annotation\I18nRoute;

class DefaultController extends Controller
{
    /**
     * @I18nRoute("/search", name="search")
     */
    public function indexAction()
    {
        return $this->render('SearchBundle:Default:index.html.twig');
    }
}
