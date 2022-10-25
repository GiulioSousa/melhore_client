<?php

namespace Melhore\Client\Controller;

class Logout implements InterfaceHandler
{
    public function handler(): void
    {
        session_destroy();
        header('location: /login');
    }
}