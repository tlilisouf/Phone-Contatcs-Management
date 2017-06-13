<?php
/**
 * Created by PhpStorm.
 * User: geekts
 * Date: 6/4/17
 * Time: 12:13 AM
 */

interface ContactDao
{
    function addContact();
    function alterContact();
    function deleteContact();
    function showDetails();
    function importContact();
    function exportContacts();
}