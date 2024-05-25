<?php
// src/Entity/Car.php
namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    private ?string $content = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?float $monthly_price = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?float $daily_price = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Range(min: 1, max: 9)]
    private ?int $places = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $gearbox = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getMonthlyPrice(): ?float
    {
        return $this->monthly_price;
    }

    public function setMonthlyPrice(float $monthly_price): static
    {
        $this->monthly_price = $monthly_price;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->daily_price;
    }

    public function setDailyPrice(float $daily_price): static
    {
        $this->daily_price = $daily_price;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function isGearbox(): ?bool
    {
        return $this->gearbox;
    }

    public function setGearbox(bool $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }
}
