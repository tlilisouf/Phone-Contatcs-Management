<?php

namespace Core\ContactsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Core\ContactsBundle\Entity\Contact;
use Core\ContactsBundle\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{
    /**
     * Home page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /* public function homeAction()
     {
         return $this->render('CoreContactsBundle:Contact:login.html.twig');
     }*/

    /**
     * List all Contacts.
     *
     */
    public function indexAction()
    {
        $contacts = $this->getDoctrine()->getRepository('CoreContactsBundle:Contact')
            ->getUserContacts($this->getUser()->getId());

        return $this->render('CoreContactsBundle:Contacts:index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Create a new Contact entity.
     *
     */
    public function addAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm('Core\ContactsBundle\Form\Type\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $contact->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contacts_show', array('id' => $contact->getId()));
        }

        return $this->render('CoreContactsBundle:Contacts:add.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Find and display a Contact entity.
     *
     */
    public function showAction(Contact $contact)
    {
        $deleteForm = $this->createForm('Core\ContactsBundle\Form\Type\ContactType', $contact);

        return $this->render('CoreContactsBundle:Contacts:show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Display a form to edit an existing Contact entity.
     *
     */
    public function editAction(Request $request, Contact $contact)
    {
        $editForm = $this->createForm('Core\ContactsBundle\Form\Type\ContactType', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contacts_edit', array('id' => $contact->getId()));
        }

        return $this->render('CoreContactsBundle:Contacts:edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete a Contact entity.
     *
     */
    public function deleteAction(Contact $contact)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();

        return $this->redirectToRoute('contacts_index');
    }


    public function exportCSVAction()
    {
        $results = $this->getDoctrine()->getManager()
            ->getRepository('CoreContactsBundle:Contact')->findAll();

        $response = new StreamedResponse();
        $response->setCallback(
            function () use ($results) {
                $handle = fopen('php://output', 'r+');
                foreach ($results as $row) {
                    $data = array(
                        $row->getName(),
                        $row->getEmail(),
                        $row->getPhone(),
                        $row->getAdress(),
                    );
                    fputcsv($handle, $data);
                }
                fclose($handle);
            }
        );
        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

        return $response;
    }

    public function sendAction(Request $request, \Swift_Mailer $mailer)
    {
        $subject = '';
        $name = '';
        $msg = '';
        $email = '';
        if ($request->getMethod() == 'POST') {
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $subject = $request->request->get('subject');
            $msg = $request->request->get('message');
        }

        $message = \Swift_Message()::newInstance()
            ->setSubject($subject)
            ->setFrom($email)
            ->setTo('souf_tlili@hotmail.com')
            ->setBody('Sent From ' . $name . ' with the above messgae ' . $msg);

        $mailer->send($message);

        return $this->render('CoreContactsBundle:Security:login.html.twig');
    }
}