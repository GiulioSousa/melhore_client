<?php

namespace Melhore\Client\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class NewUser implements InterfaceHandler
{
    use MessageManagerTrait;

    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handler(): void
    {
        $userName = strip_tags($_POST['user_name']);
        $password = strip_tags($_POST['password']);

        if ($userName === '' || $password === '') {
            $this->setMessage("error", "Todos os campos devem estar preenchidos");
            header('location: /novo-cliente');
            return;
        }

        $user = new User();
        $user->setUserName($userName);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            $user = $this->entityManager->find(User::class, $id);
            $user->setUserName($userName);
        } else {
            $user = new User();
            $user->setUserName($userName);
            $user->setPassword($password);
            $user->setAccessMode('CLIENT');
            $user->setPhotoName('profile-blank.png');
            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();
        $this->setMessage("success", "Usuário criado com sucesso!");
        header('location: /painel-admin', true, 302);
    }
}
