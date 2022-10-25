<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\Diagnostic;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class DeleteDiagnostic implements InterfaceHandler
{
    use MessageManagerTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)    ;

        $diagnostic = $this->entityManager->getReference(Diagnostic::class, $id);

        $this->entityManager->remove($diagnostic);
        $this->entityManager->flush();

        $this->setMessage("success", "Diagnóstico excluído com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}");
    }
}