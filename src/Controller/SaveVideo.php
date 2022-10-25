<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Entity\Video;
use Melhore\Client\Entity\VideoHighlight;
use Melhore\Client\Entity\VideoHowDo;
use Melhore\Client\Entity\VideoTeam;
use Melhore\Client\Entity\VideoWhatDo;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class SaveVideo implements InterfaceHandler
{
    use MessageManagerTrait;

    private $userRepository;
    private $videoHighlightRepository;
    private $videoWhatDoRepository;
    private $videoHowDoRepository;
    private $videoTeamRepository;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $this->entityManager->getRepository(User::class);
        $this->videoHighlightRepository = $this->entityManager->getRepository(VideoHighlight::class);
        $this->videoWhatDoRepository = $this->entityManager->getRepository(VideoWhatDo::class);
        $this->videoHowDoRepository = $this->entityManager->getRepository(VideoHowDo::class);
        $this->videoTeamRepository = $this->entityManager->getRepository(VideoTeam::class);
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $tagParam = strip_tags($_GET['tag']);
        $tagArray = Video::getTagArray();
        $title = strip_tags($_POST['video_title']);
        $description = strip_tags($_POST['video_description']);
        $url = strip_tags($_POST['video_url']);

        if (empty($title)|| empty($description) || empty($url)) {
            $this->setMessage("error", "Todos os campos devem ser preenchidos");
            header("location: /editar-video?id={$id}&tag={$tagParam}");
            return;
        }

        switch ($tagParam) {
            case $tagArray[0]:
                $video = $this->videoHighlightRepository->findOneBy(['id' => $id]);
                break;
            case $tagArray[1]:
                $video = $this->videoWhatDoRepository->findOneBy(['id' => $id]);
                break;
            case $tagArray[2]:
                $video = $this->videoHowDoRepository->findOneBy(['id' => $id]);
                break;
            case $tagArray[3]:
                $video = $this->videoTeamRepository->findOneBy(['id' => $id]);
                break;
        }

        $video->setVideoTitle($title);
        $video->setVideoDescription($description);
        $video->setVideoUrl($url);

        $this->entityManager->flush();

        $user = $this->userRepository->findOneBy(['userName' => $_SESSION['userName']]);

        $this->setMessage("success", "Informações atualizadas com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}", true, 302);
    }
}
