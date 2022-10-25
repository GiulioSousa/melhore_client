<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\Metric;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class DeleteMetric implements InterfaceHandler
{
    use MessageManagerTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $metric = $this->entityManager->getReference(Metric::class, $id);

        $this->entityManager->remove($metric);
        $this->entityManager->flush();

        $this->setMessage("success", "Métrica excluída com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}");
    }
}