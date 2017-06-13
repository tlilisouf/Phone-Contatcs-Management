<?php
/**
 * Created by PhpStorm.
 * User: geekts
 * Date: 6/4/17
 * Time: 12:18 AM
 */

interface AdminDao
{
    function deleteUser();
    function ActivateUser();
    function BlockUser();
}