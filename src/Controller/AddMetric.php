<?php

namespace Melhore\Client\Controller;

use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Melhore\Client\Entity\{Metric, User};
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class AddMetric implements InterfaceHandler
{
    use MessageManagerTrait;

    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    
    public function handler(): void
    {
        $userId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $user = $this->entityManager->find(User::class, $userId);
        $date = new DateTimeImmutable(strip_tags($_POST['date']));
        $metricData = filter_input(INPUT_POST, 'metric', FILTER_VALIDATE_FLOAT);

        $metric = new Metric($date, $metricData);
        $metric->setUser($user);
        $user->metrics()->add($metric);

        $this->entityManager->persist($user);
        $this->entityManager->persist($metric);
        $this->entityManager->flush();

        $this->setMessage("success", "Métrica adicionada com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}", true, 302);
    }
}