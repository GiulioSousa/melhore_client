<?php

namespace Melhore\Client\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Melhore\Client\Helper\SetUserTrait;

#[Entity, Table(name: 'diagnostic')]
class Diagnostic
{
    use SetUserTrait;

    #[Id, GeneratedValue, Column(type: Types::INTEGER)]
    private int $id;

    #[ManyToOne(
        targetEntity: User::class,
        inversedBy: 'diagnostics'
    )]
    private User $user;

    public function __construct(
        #[Column(name: 'diagnostic_text', type: Types::TEXT)]
        private string $diagnosticText
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDiagnosticText(): string
    {
        return $this->diagnosticText;
    }

    public function setDiagnosticText(string $diagnosticText): void
    {
        $this->diagnosticText = $diagnosticText;
    }
}
