<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;

class LoginForm implements InterfaceHandler
{
    use RenderHtmlTrait, MessageManagerTrait;

    public function handler(): void
    {
        $this->setTitle('Área do cliente - Login | Melhore!');
        $this->setDescription('Que tal melhorar ainda mais o fluxo e o desempenho de suas redes?');
        echo $this->renderHtml('login.php', []);
    }
}