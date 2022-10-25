<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\{MessageManagerTrait, RenderHtmlTrait};
use Melhore\Client\Infra\EntityManagerCreator;

class UsersList implements InterfaceHandler
{
    use RenderHtmlTrait, MessageManagerTrait;

    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handler(): void
    {
        $userName = strip_tags($_SESSION['userName']);
        
        if (isset($_SESSION['client'])) {
            unset($_SESSION['client']);
        }

        if (!isset($_SESSION['admin'])) {
            header('location: /logout');
            $this->setMessage("error", "Erro ao autenticar usuário");
            header('location: /login');
        }

        $this->setTitle('Home - Painel administrativo | Melhore!');
        echo $this->renderHtml('admin-panel.php', [
            'user' => $this->userRepository->findOneBy(['userName' => $userName]),
            'clients' => $this->userRepository->findBy(['accessMode' => 'CLIENT'])
        ]);
    }
}
