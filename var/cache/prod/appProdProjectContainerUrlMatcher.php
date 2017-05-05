<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // admin_dashboard.en
        if ($pathinfo === '/en/admin') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_route' => 'admin_dashboard.en',);
        }

        // admin_dashboard.nl
        if ($pathinfo === '/nl/admin') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'nl',  '_route' => 'admin_dashboard.nl',);
        }

        // admin_dashboard.fr
        if ($pathinfo === '/fr/admin') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'fr',  '_route' => 'admin_dashboard.fr',);
        }

        // admin_dashboard.de
        if ($pathinfo === '/de/admin') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'de',  '_route' => 'admin_dashboard.de',);
        }

        // admin_login.en
        if ($pathinfo === '/en/admin/login') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::loginAction',  '_locale' => 'en',  '_route' => 'admin_login.en',);
        }

        // admin_login.nl
        if ($pathinfo === '/nl/admin/login') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::loginAction',  '_locale' => 'nl',  '_route' => 'admin_login.nl',);
        }

        // admin_login.fr
        if ($pathinfo === '/fr/admin/login') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::loginAction',  '_locale' => 'fr',  '_route' => 'admin_login.fr',);
        }

        // admin_login.de
        if ($pathinfo === '/de/admin/login') {
            return array (  '_controller' => 'GlgProductions\\AdminBundle\\Controller\\DefaultController::loginAction',  '_locale' => 'de',  '_route' => 'admin_login.de',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
