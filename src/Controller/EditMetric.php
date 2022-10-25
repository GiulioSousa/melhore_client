<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\Metric;
use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class EditMetric implements InterfaceHandler
{
    use MessageManagerTrait, RenderHtmlTrait;

    private $userRepository;
    private $metricRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
        $this->metricRepository = $entityManager->getRepository(Metric::class);
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $metric = $this->metricRepository->findOneBy(['id' => $id]);

        $userName = $_SESSION['userName'];
        $user = $this->userRepository->findOneBy(['userName' => $userName]);

        $this->setTitle('Editar métrica | Melhore!');
        echo $this->renderHtml('form-metric.php', [
            'user' => $user,
            'id' => $id,
            'metric' => $metric
        ]);
    }
}