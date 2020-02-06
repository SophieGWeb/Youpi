<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgeRepository")
 */
class Age
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $tranche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTranche(): ?string
    {
        return $this->tranche;
    }

    public function setTranche(string $tranche): self
    {
        $this->tranche = $tranche;

        return $this;
    }
}
