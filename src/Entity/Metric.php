<?php

namespace Melhore\Client\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Melhore\Client\Helper\SetUserTrait;

#[Entity, Table(name: 'metric')]
class Metric
{
    use SetUserTrait;

    #[Id, GeneratedValue, Column(type: Types::INTEGER)]
    private int $id;

    #[ManyToOne(
        targetEntity: User::class,
        inversedBy: 'metrics'
    )]
    private User $user;

    public function __construct(
        #[Column(type: Types::DATE_IMMUTABLE)]
        private DateTimeInterface $date,

        #[Column(name: 'metric_data')]
        private float $metricData
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function getFormattedDate(): string
    {
        return $this->date->format('d-m-Y');
    }

    public function setDate(DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function getMetricData(): float
    {
        return $this->metricData;
    }

    public function setMetricData(float $metricData): void
    {
        $this->metricData = $metricData;
    }
}
