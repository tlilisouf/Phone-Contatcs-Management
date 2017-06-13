<?php

namespace Core\ContactsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CoreContactsBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
