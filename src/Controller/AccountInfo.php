<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class AccountInfo implements InterfaceHandler
{
    use RenderHtmlTrait;
    use MessageManagerTrait;

    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handler(): void
    {
        if (isset($_SESSION['client'])) {
            unset($_SESSION['client']);
        }
        
        $userName = $_SESSION['userName'];
        $user = $this->userRepository->findOneBy(['userName' => $userName]);
        $this->setTitle('Melhore! | Informações da conta');
        echo $this->renderHtml('account-info.php', ['user' => $user]);
    }
}