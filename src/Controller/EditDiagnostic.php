<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\Diagnostic;
use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class EditDiagnostic implements InterfaceHandler
{
    use MessageManagerTrait, RenderHtmlTrait;

    private $userRepository;
    private $diagnosticRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
        $this->diagnosticRepository = $entityManager->getRepository(Diagnostic::class);
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $diagnostic = $this->diagnosticRepository->findOneBy(['id' => $id]);

        $userName = strip_tags($_SESSION['userName']);
        $user = $this->userRepository->findOneBy(['userName' => $userName]);

        $this->setTitle('Editar diagnóstico | Melhore!');
        echo $this->renderHtml('form-diagnostic.php', [
            'user' => $user,
            'id' => $id,
            'diagnostic' => $diagnostic
        ]);
    }
}