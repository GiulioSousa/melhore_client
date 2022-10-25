<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class DeleteUser implements InterfaceHandler
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

        if (is_null($id) || $id === false) {
            header('location: /painel-admin');
            return;
        }
        
        $user = $this->entityManager->getReference(User::class, $id);
       
        $this->entityManager->remove($user);
        $this->entityManager->flush();

        $this->setMessage("success", "Usuário excluído com sucesso!");
        header("location: /painel-admin");
    }
}