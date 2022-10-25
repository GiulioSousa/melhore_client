<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\User;
use Melhore\Client\Entity\Video;
use Melhore\Client\Entity\VideoHighlight;
use Melhore\Client\Entity\VideoHowDo;
use Melhore\Client\Entity\VideoTeam;
use Melhore\Client\Entity\VideoWhatDo;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Helper\RenderHtmlTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class EditVideo implements InterfaceHandler
{
    use MessageManagerTrait, RenderHtmlTrait;

    private $userRepository;
    private $videoHighlightRepository;
    private $videoWhatDoRepository;
    private $videoHowDoRepository;
    private $videoTeamRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
        $this->videoHighlightRepository = $entityManager->getRepository(VideoHighlight::class);
        $this->videoWhatDoRepository = $entityManager->getRepository(VideoWhatDo::class);
        $this->videoHowDoRepository = $entityManager->getRepository(VideoHowDo::class);
        $this->videoTeamRepository = $entityManager->getRepository(VideoTeam::class);
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $tagParam = strip_tags($_GET['tag']);
        $tagArray = Video::getTagArray();

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

        $userName = $_SESSION['userName'];
        $user = $this->userRepository->findOneBy(['userName' => $userName]);
        
        $this->setTitle('Editar video | Melhore!');
        echo $this->renderHtml('form-video.php', [
            'user' => $user,
            'id' => $id,
            'tag' => $tagParam,
            'video' => $video
        ]);
    }
}
