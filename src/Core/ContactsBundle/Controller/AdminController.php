<?php

namespace Core\ContactsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Core\ContactsBundle\Entity\User;

class AdminController extends Controller
{
    public function adminAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $users = $this->getDoctrine()->getRepository('CoreContactsBundle:User')
            ->findAll();
        return $this->render('CoreContactsBundle:Admin:index.html.twig', array('users' => $users,));
    }

    public function deleteAction(User $user)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $user = $this->getDoctrine()->getRepository('CoreContactsBundle:User')
            ->find($user);
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('admin_index');;
    }
}