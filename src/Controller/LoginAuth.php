<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class LoginAuth implements InterfaceHandler
{
    use MessageManagerTrait;

    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository((User::class));
    }
    public function handler(): void
    {
        $user = strip_tags($_POST['login']);

        $password = strip_tags($_POST['password']);
        $user = $this->userRepository->findOneBy(['userName' => $user]);

        if (is_null($user) || !$user->passwordAuthenticate($password)) {
            $this->setMessage("error", "Usuário ou senha incorretos");
            header('location: /login');
            return;
        }

        if ($user->tokenAdmin()) {
            $_SESSION['logged'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['userName'] = $user->getUserName();
            $_SESSION['userId'] = $user->getId();

            $this->setMessage("success", "Bem vindo, {$_SESSION['userName']}!");
            header('location: /painel-admin');
            return;
        }
        
        $_SESSION['logged'] = true;
        $_SESSION['userName'] = $user->getUserName();
        $_SESSION['userId'] = $user->getId();

        $this->setMessage("success", "Bem vindo, {$_SESSION['userName']}!");
        header('location: /area-cliente');
    }
}
