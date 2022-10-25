<?php

namespace Melhore\Client\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Melhore\Client\Helper\SetUserTrait;

#[Entity]
#[Table(name: 'video_highlight')]
class VideoHighlight extends Video
{
    use SetUserTrait;

    #[Id, GeneratedValue, Column(type: Types::INTEGER)]
    private int $id;

    #[ManyToOne(targetEntity: User::class, inversedBy: 'videosHighlight')]
    #[JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private User $user;

    public function getId(): int
    {
        return $this->id;
    }
}
