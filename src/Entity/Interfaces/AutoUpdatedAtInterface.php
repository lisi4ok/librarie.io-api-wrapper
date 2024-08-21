<?php

namespace App\Entity\Interfaces;

interface AutoUpdatedAtInterface
{
    public function getUpdatedAt(): ?\DateTimeInterface;

    public function setUpdatedAt(): self;
}
