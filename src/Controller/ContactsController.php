<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;


class ContactsController {
    public function contacts() {
        return new Response('Contacts page');
    }
}