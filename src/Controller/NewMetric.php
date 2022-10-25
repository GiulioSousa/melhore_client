<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class NewMetric implements InterfaceHandler
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
        $userName = $_SESSION['userName'];
        $user = $this->userRepository->findOneby(['userName' => $userName]);
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $this->setTitle('Nova métrica | Melhore!');
        echo $this->renderHtml('form-metric.php', [
            'id' => $id,
            'user' => $user]);
    }
}