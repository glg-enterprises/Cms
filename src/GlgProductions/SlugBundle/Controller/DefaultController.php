<?php

namespace GlgProductions\SlugBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\I18nRoutingBundle\Routing\Annotation\I18nRoute;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * @I18nRoute("/", name="homepage")
	 */
    public function indexAction()
    {
        return $this->render('ThemeBundle:Default:Layout.html.twig', [
        	"theme" => $this->get("theme")::get_theme(),
        	"site_title" => $this->get("cms")::get_setting("site_title")->getSetting(),
            "facebook_url" => $this->get("cms")::get_setting("facebook")->getSetting(),
            "categories" => $this->get("cms")::get_categories(),
            "featured" => $this->get("cms")::get_featured(),
    	]);
    }
}
