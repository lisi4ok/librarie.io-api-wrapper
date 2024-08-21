<?php

namespace App\Entity\Interfaces;

interface AutoCreatedAtInterface
{
    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(): self;
}
