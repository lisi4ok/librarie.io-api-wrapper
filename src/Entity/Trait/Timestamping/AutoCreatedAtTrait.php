<?php

namespace App\Entity\Trait\Timestamping;

use Doctrine\ORM\Mapping as ORM;

trait AutoCreatedAtTrait
{
    #[ORM\Column(name: "created_at", type: "datetime", nullable: true)]
    protected $createdAt;

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): self
    {
        $this->createdAt = new \DateTime;

        return $this;
    }
}
