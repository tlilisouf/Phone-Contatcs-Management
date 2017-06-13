<?php

namespace Core\ContactsBundle\Repository;
use Core\ContactsBundle\Entity\Contact;
/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUserContacts($id)

    {
        $query = $this->_em->createQuery("SELECT c FROM CoreContactsBundle:Contact c JOIN c.user u WHERE u.id = :id");
        $query->setParameter('id', $id);

        return $query->getResult();

    }
}