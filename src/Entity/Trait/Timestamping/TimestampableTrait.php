<?php

namespace App\Entity\Trait\Timestamping;

trait TimestampableTrait
{
    use AutoCreatedAtTrait, AutoUpdatedAtTrait;
}