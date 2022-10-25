<?php

namespace Melhore\Client\Controller;

use Melhore\Client\Entity\Video;
use Melhore\Client\Entity\VideoHighlight;
use Melhore\Client\Entity\VideoHowDo;
use Melhore\Client\Entity\VideoTeam;
use Melhore\Client\Entity\VideoWhatDo;
use Melhore\Client\Helper\MessageManagerTrait;
use Melhore\Client\Infra\EntityManagerCreator;

class DeleteVideo implements InterfaceHandler
{
    use MessageManagerTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handler(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $tagParam = strip_tags($_GET['tag']);
        $tagArray = Video::getTagArray();

        switch ($tagParam) {
            case $tagArray[0]:
                $video = $this->entityManager->getReference(VideoHighlight::class, $id);
                break;
            case $tagArray[1]:
                $video = $this->entityManager->getReference(VideoWhatDo::class, $id);
                break;
            case $tagArray[2]:
                $video = $this->entityManager->getReference(VideoHowDo::class, $id);
                break;
            case $tagArray[3]:
                $video = $this->entityManager->getReference(VideoTeam::class, $id);
                break;
        }

        $this->entityManager->remove($video);
        $this->entityManager->flush();

        $this->setMessage("success", "Vídeo excluído com sucesso");
        header("location: /cliente-info?id={$_SESSION['clientId']}");
    }
}
