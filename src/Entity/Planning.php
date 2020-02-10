<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanningRepository")
 */
class Planning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Collectivite", inversedBy="plannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $collectivite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activiteMatin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activiteAprem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCollectivite(): ?collectivite
    {
        return $this->collectivite;
    }

    public function setCollectivite(?collectivite $collectivite): self
    {
        $this->collectivite = $collectivite;

        return $this;
    }

    public function getActiviteMatin(): ?string
    {
        return $this->activiteMatin;
    }

    public function setActiviteMatin(string $activiteMatin): self
    {
        $this->activiteMatin = $activiteMatin;

        return $this;
    }

    public function getActiviteAprem(): ?string
    {
        return $this->activiteAprem;
    }

    public function setActiviteAprem(string $activiteAprem): self
    {
        $this->activiteAprem = $activiteAprem;

        return $this;
    }
}
