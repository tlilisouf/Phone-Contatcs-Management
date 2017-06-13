<?php

namespace Core\ContactsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('CoreContactsBundle:Default:index.html.twig');
    }
}
