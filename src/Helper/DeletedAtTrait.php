<?php

namespace App\Helper;

use Doctrine\ORM\Mapping as ORM;

trait DeletedAtTrait
{
    public function deactivate(): self
    {
        $this->deletedAt = new \DateTime();
        $this->isActive = false;

        return $this;
    }

    public function activate(): self
    {
        $this->deletedAt = null;
        $this->isActive = true;

        return $this;
    }
}
