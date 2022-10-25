<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\PhotoFilterTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class SaveAccount implements InterfaceHandler
{
    use PhotoFilterTrait;
    use MessageManagerTrait;

    private $userRepository;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function handler(): void
    {
        $userName = strip_tags($_SESSION['userName']);
        $user = $this->userRepository->findOneBy(['userName' => $userName]);

        $newUserName = strip_tags($_POST['user_name']);
        $newEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $password = strip_tags($_POST['password']);
        $confirmPassword = strip_tags($_POST['confirm_password']);

        if ($password !== $confirmPassword) {
            $this->setMessage("error", "As senhas digitadas não correspondem");
            $_SESSION['authenticate'] = true;
            header('location: /editar-conta');
            return;
        }

        if (isset($_FILES['name'])) {
            $photo = $this->photoFilter($_FILES['file']);
            $photo['name'] = $user->getUserName() . '.png';
            $user->uploadPhoto($photo);
            $user->setPhotoName($photo['name']);
        }

        $user->setUserName($newUserName);
        $user->setEmail($newEmail);
        $user->setPassword($password);

        $this->entityManager->flush();

        if(isset($_SESSION['admin'])) {
            $this->setMessage("success", "Informações da conta atualizadas com sucesso!");
            header('location: /painel-admin');
            return;
        }
        
        $this->setMessage("success", "Informações da conta atualizadas com sucesso!");
        header('location: /area-cliente');

    }
}