<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class EditAccount implements InterfaceHandler
{
    use MessageManagerTrait, RenderHtmlTrait;

    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handler(): void
    {
        $userName = strip_tags($_SESSION['userName']);
        $user = $this->userRepository->findOneBy(['userName' => $userName]);

        if (!isset($_SESSION['authenticate'])) {
            $_SESSION['edit'] = true;
            header('location: /autenticar-usuario');
            return;

        }

        unset($_SESSION['authenticate']);

        $this->setTitle('Editar Conta | Melhore!');
        echo $this->renderHtml('form-account.php', ['user' => $user]);
    }
}