<?php

namespace App\Entity\Trait\Timestamping;

use Doctrine\ORM\Mapping as ORM;

trait AutoUpdatedAtTrait
{
    #[ORM\Column(name: "updated_at", type: "datetime", nullable: true)]
    protected $updatedAt;

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): self
    {
        $this->updatedAt = new \DateTime;

        return $this;
    }
}