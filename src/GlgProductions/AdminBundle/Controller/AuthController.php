<?php

namespace GlgProductions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\I18nRoutingBundle\Routing\Annotation\I18nRoute;
use Symfony\Component\HttpFoundation\Request;

use GlgProductions\AdminBundle\Form\UserForm;
use GlgProductions\AdminBundle\Entity\User;

class AuthController extends Controller
{
    /**
     * @I18nRoute({"en":"/en/admin/login","nl":"/nl/admin/login","fr":"/fr/admin/login","de":"/de/admin/login"},name="admin_login")
     */
    public function loginAction(){
        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirectToRoute('admin_dashboard');
        }
        $authentiationUtils = $this->get('security.authentication_utils');
        $error = $authentiationUtils->getLastAuthenticationError();
        $username = $authentiationUtils->getLastUsername();

        return $this->render('AdminBundle:Auth:login.html.twig', [
            "username" => $username,
            "error" => $error
        ]);
    }

    /**
     * @I18nRoute({ "en": "/en/admin/login_check", "nl": "/nl/admin/login_check", "fr": "/fr/admin/login_check", "de": "/de/admin/login_check" },name="admin_login_check")
     */
    public function login_check(){
        //symfony
    }
    /**
     * @I18nRoute({ "en": "/en/logout", "nl": "/nl/logout", "fr": "/fr/logout", "de": "/de/logout" }, name="admin_logout")
     */
    public function logoutAction(){
        // symfony
    }
}
