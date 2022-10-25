<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Melhore\Client\Infra\EntityManagerCreator;

require __DIR__ . '/vendor/autoload.php';

$entityManager = (new EntityManagerCreator())->getEntityManager();

ConsoleRunner::run(new SingleManagerProvider($entityManager));