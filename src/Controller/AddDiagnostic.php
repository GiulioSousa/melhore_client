<?php

namespace Melhore\Client\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Melhore\Client\Entity\{Diagnostic, User};
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class AddDiagnostic implements InterfaceHandler
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
        $textDiagnostic = strip_tags($_POST['diagnostic']);

        $diagnostic = new Diagnostic($textDiagnostic);
        $diagnostic->setUser($user);
        $user->diagnostics()->add($diagnostic);
        
        $this->entityManager->persist($user);
        $this->entityManager->persist($diagnostic);
        $this->entityManager->flush();

        $this->setMessage("success", "Diagnóstico adicionado com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}", true, 302);
    }
}