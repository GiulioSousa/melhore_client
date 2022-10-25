<?php

namespace Melhore\Client\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Melhore\Client\Entity\User;
use Melhore\Client\Entity\Video;
use Melhore\Client\Entity\VideoHighlight;
use Melhore\Client\Infra\EntityManagerCreator;

class Persistence implements InterfaceHandler
{
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
        $title = strip_tags(($_POST['video_title']));
        $description = strip_tags($_POST['video_description']);
        
        $user = $this->entityManager->find(User::class, $userId);

        switch ($tagParam) {
            case $tagArray[0]:
                $video = new VideoHighlight($url, $title, $description);
                $video->setUser($user);
        }
    }
}