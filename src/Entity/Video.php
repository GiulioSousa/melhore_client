<?php

namespace Melhore\Client\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
abstract class Video
{    
    public function __construct(
        #[Column(name: 'video_url')]
        private string $videoUrl,
    
        #[Column(name: 'video_title')]
        private string $videoTitle,
    
        #[Column(name: 'video_description', type:Types::TEXT)]
        private string $videoDescription,
    )
    {
        
    }

    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    public function setVideoUrl(string $videoUrl): void
    {
        $this->videoUrl = $videoUrl;
    }
    
    public function getVideoTitle(): string
    {
        return $this->videoTitle;
    }

    public function setVideoTitle(string $videoTitle): void
    {
        $this->videoTitle = $videoTitle;
    }

    public function getVideoDescription(): string
    {
        return $this->videoDescription;
    }

    public function setVideoDescription(string $videoDescription): void
    {
        $this->videoDescription = $videoDescription;
    }

    public static function getTagArray(): array
    {
        return ['destaque', 'o-que-faremos', 'como-faremos', 'equipe'];
    }
}