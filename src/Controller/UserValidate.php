<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class UserValidate implements InterfaceHandler
{
    use MessageManagerTrait;

    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handler(): void
    {
        $user = $this->userRepository->findOneBy(['userName' => $_SESSION['userName']]);
        $password = strip_tags($_POST['password']);

        if (is_null($user) || !$user->passwordAuthenticate($password)) {
            header('location: /logout');
            $this->setMessage("error", "Senha inválida. Por favor, faça o login e tente novamente.");
            header('location: /login');
            echo "Usuário ou senha inválidos!";
            return;
        }

        $_SESSION['authenticate'] = true;
        header('location: /editar-conta');
    }
}