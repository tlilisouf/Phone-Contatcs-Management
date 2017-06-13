<?php
/**
 * Created by PhpStorm.
 * User: geekts
 * Date: 6/4/17
 * Time: 12:03 AM
 */

 interface UserDao
{
     function saveUser();
     function confirmInscription();
     function resetPassword();
     function modifyProfile();
}