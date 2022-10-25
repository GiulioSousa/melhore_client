<?php

namespace Melhore\Client\Controller;

use DateTimeImmutable;
use Melhore\Client\Entity\Metric;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class SaveMetric implements InterfaceHandler
{
    use MessageManagerTrait;

    private $metricRepository;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->metricRepository = $this->entityManager->getRepository(Metric::class);
    }

    public function handler(): void
    {
        $date = new DateTimeImmutable(strip_tags($_POST['date']));
        $metricData = filter_input(INPUT_POST, 'metric', FILTER_VALIDATE_FLOAT);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $metric = $this->metricRepository->findOneBy(['id' => $id]);

        $metric->setDate($date);
        $metric->setMetricData($metricData);

        $this->entityManager->flush();

        $this->setMessage("success", "Métricas atualizadas com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}", true, 302);
    }
}
