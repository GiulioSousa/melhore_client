<?php

namespace Melhore\Client\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = true;

        $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => '***',
            'password' => '***',
            'dbname' => '***'
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode, null, null);

        return EntityManager::create($dbParams, $config);
    }
}