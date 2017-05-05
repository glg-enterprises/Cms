<?php

namespace GlgProductions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\I18nRoutingBundle\Routing\Annotation\I18nRoute;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @I18nRoute({"en":"/en/admin", "nl":"/nl/admin", "fr":"/fr/admin", "de":"/de/admin"},name="admin_dashboard")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Admin:Dashboard.html.twig', [
        	"site_title" => $this->get("cms")::get_setting("site_title")->getSetting(),
        	"widgets" => null
    	]);
    }
}
