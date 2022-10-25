<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class NewClient implements InterfaceHandler
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
        $this->setTitle('Novo cliente | Melhore!');
        echo $this->renderHtml('novo-cliente.php', [
            'user' => $this->userRepository->findOneBy(['userName' => $userName])
        ]);
    }
}