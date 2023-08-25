<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(mercure: true)]
#[ORM\Entity]
class PowerPlant
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    public string $name = '';

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(max: 255)]
    public string $internalIdentifier = '';

    #[ORM\Column]
    #[Assert\NotNull]
    public float $powerKw;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPowerKw(): float
    {
        return $this->powerKw;
    }

    public function setPowerKw($powerKw): self
    {
        $this->powerKw = $powerKw;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
