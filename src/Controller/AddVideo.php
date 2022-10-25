<?php

namespace Melhore\Client\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Melhore\Client\Entity\User;
use Melhore\Client\Entity\Video;
use Melhore\Client\Entity\VideoHighlight;
use Melhore\Client\Entity\VideoHowDo;
use Melhore\Client\Entity\VideoTeam;
use Melhore\Client\Entity\VideoWhatDo;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class AddVideo implements InterfaceHandler
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
        $tagParam = strip_tags($_GET['tag']);
        $tagArray = Video::getTagArray();
        $url = strip_tags($_POST['video_url']);
        $title = strip_tags($_POST['video_title']);
        $description = strip_tags($_POST['video_description']);

        $user = $this->entityManager->find(User::class, $userId);

        switch ($tagParam) {
            case $tagArray[0]:
                $video = new VideoHighlight($url, $title, $description);
                $video->setUser($user);
                $user->videosHighlight()->add($video);
                break;
            case $tagArray[1]:
                $video = new VideoWhatDo($url, $title, $description);
                $video->setUser($user);
                $user->videosWhatDo()->add($video);
                break;
            case $tagArray[2]:
                $video = new VideoHowDo($url, $title, $description);
                $video->setUser($user);
                $user->videosHowDo()->add($video);
                break;
            case $tagArray[3]:
                $video = new VideoTeam($url, $title, $description);
                $video->setUser($user);
                $user->videosTeam()->add($video);
                break;
        }

        $this->entityManager->persist($video);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->setMessage("success", "Video adicionado com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}", true, 302);
    }
}
