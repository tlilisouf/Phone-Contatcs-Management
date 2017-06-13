<?php

namespace Core\ContactsBundle\Controller;


use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        $route = $this->get('router')->getRouteCollection()->get('admin_login');
        if ($route) {

            $template = sprintf('CoreContactsBundle:Security:login.html.twig');
        } else {
            $template = sprintf('FOSUserBundle:Security:login.html.twig');
        }

        return $this->render($template, $data);

    }
}
