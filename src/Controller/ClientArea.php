<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\{Diagnostic, Metric, User, VideoHighlight, VideoHowDo, VideoTeam, VideoWhatDo};
use Melhore\Client\Helper\{MessageManagerTrait, RenderHtmlTrait};
use Melhore\Client\Infra\EntityManagerCreator;

class ClientArea implements InterfaceHandler
{    
    use RenderHtmlTrait, MessageManagerTrait;

    private $userRepository;
    private $videoHighlightRepository;
    private $videoWhatDoRepository;
    private $videoHowDoRepository;
    private $videoTeamRepository;
    private $metricsRepository;
    private $diagnosticsReporitory; //tornar em trait

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
        $this->videoHighlightRepository = $entityManager->getRepository(VideoHighlight::class);
        $this->videoWhatDoRepository = $entityManager->getRepository(VideoWhatDo::class);
        $this->videoHowDoRepository = $entityManager->getRepository(VideoHowDo::class);
        $this->videoTeamRepository = $entityManager->getRepository(VideoTeam::class);
        $this->metricsRepository = $entityManager->getRepository(Metric::class);
        $this->diagnosticsReporitory = $entityManager->getRepository(Diagnostic::class); //tornar em trait
    }

    public function handler(): void
    {
        $userName = strip_tags($_SESSION['userName']);
        $user = $this->userRepository->findOneBy(['userName' => $userName]);

        if (isset($_SESSION['admin'])) {
            $this->setMessage("warning", "A área de clientes só pode ser acessada por clientes.");
            header('location: /painel-admin');
            return;
        }

        if (!$_SESSION['logged'] || $_SESSION['userName'] !== $user->getUserName()) {
            header('location: /logout');
            $this->setMessage("error", "Erro ao autenticar o usuário. Por favor, efetue novamente o login.");
            header('location: /login');
        }
        
        $this->setTitle('Home - Área do cliente | Melhore!');
        echo $this->renderHtml('area-cliente.php', [
            'user' => $user,
            'videosHighlight' => $this->videoHighlightRepository->findByUser(['user' => $user->GetId()]),
            'videosWhatDo' => $this->videoWhatDoRepository->findByUser(['user' => $user->GetId()]),
            'videosHowDo' => $this->videoHowDoRepository->findByUser(['user' => $user->GetId()]),
            'videosTeam' => $this->videoTeamRepository->findByUser(['user' => $user->GetId()]),
            'metrics' => $this->metricsRepository->findByUser(['user' => $user->GetId()]),
            'diagnostics' => $this->diagnosticsReporitory->findByUser(['user' => $user->GetId()]) //tornar em trait
        ]);
    }
}
