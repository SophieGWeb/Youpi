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
     * @ORM\ManyToOne(targetEntity="App\Entity\collectivite", inversedBy="plannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $creche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreche(): ?collectivite
    {
        return $this->creche;
    }

    public function setCreche(?collectivite $creche): self
    {
        $this->creche = $creche;

        return $this;
    }
}
