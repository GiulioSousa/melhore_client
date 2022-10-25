<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\Diagnostic;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class SaveDiagnostic implements InterfaceHandler
{
    use MessageManagerTrait;
    
    private $diagnosticRepository;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->diagnosticRepository = $this->entityManager->getRepository(Diagnostic::class);
    }

    public function handler(): void
    {
        $diagnosticText = strip_tags($_POST['diagnostic']);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $diagnostic = $this->diagnosticRepository->findOneBy(['id' => $id]);

        $diagnostic->setDiagnosticText($diagnosticText);

        $this->entityManager->flush();

        $this->setMessage("success", "Diagnóstico atualizado com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}", true, 302);
    }
}