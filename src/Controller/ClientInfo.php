<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\{
    Diagnostic,
    Metric,
    User,
    Video,
    VideoHighlight,
    VideoHowDo,
    VideoTeam,
    VideoWhatDo
};
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class ClientInfo implements InterfaceHandler
{
    use MessageManagerTrait, RenderHtmlTrait;

    private $userRepository;
    private $videoHighlightRepository;
    private $videoWhatDoRepository;
    private $videoHowDoRepository;
    private $videoTeamRepository;
    private $metricsRepository;
    private $diagnosticsReporitory;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
        $this->videoHighlightRepository = $entityManager->getRepository(VideoHighlight::class);
        $this->videoWhatDoRepository = $entityManager->getRepository(VideoWhatDo::class);
        $this->videoHowDoRepository = $entityManager->getRepository(VideoHowDo::class);
        $this->videoTeamRepository = $entityManager->getRepository(VideoTeam::class);
        $this->metricsRepository = $entityManager->getRepository(Metric::class);
        $this->diagnosticsReporitory = $entityManager->getRepository(Diagnostic::class);
    }

    public function handler(): void
    {
        $userName = strip_tags($_SESSION['userName']);
        $clientId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $client = $this->userRepository->findOneBy(['id' => $clientId]);
        $_SESSION['clientId'] = $client->getId();
        $_SESSION['clientName'] = $client->getUserName();
        $tag = Video::getTagArray();
        
        $this->setTitle("Conteúdo de {$_SESSION['clientName']} | Melhore!");
        echo $this->renderHtml('client-info.php', [
            'id' => $clientId,
            'clientName' => $_SESSION['clientName'],
            'tag' => $tag,
            'user' => $this->userRepository->findOneBy(['userName' => $userName]),
            'videosHighlight' => $this->videoHighlightRepository->findByUser(['user' => $clientId]),
            'videosWhatDo' => $this->videoWhatDoRepository->findByUser(['user' => $clientId]),
            'videosHowDo' => $this->videoHowDoRepository->findByUser(['user' => $clientId]),
            'videosTeam' => $this->videoTeamRepository->findByUser(['user' => $clientId]),
            'metrics' => $this->metricsRepository->findByUser(['user' => $clientId]),
            'diagnostics' => $this->diagnosticsReporitory->findByUser(['user' => $clientId])
        ]);
    }
}
