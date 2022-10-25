<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;

class AdminPanel implements InterfaceHandler
{
    use RenderHtmlTrait;
    use MessageManagerTrait;

    public function handler(): void
    {
        if (isset($_SESSION['admin'])) {
            $this->setTitle('Melhore! | Painel administrativo');
            echo $this->renderHtml('admin-panel.php', []);
        } else {
            header('location: /client-area');
        }
    }
}