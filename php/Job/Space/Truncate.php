<?php

namespace Job\Space;

use Exception;

class Truncate extends Job
{
    public function run(): void
    {
        $space = $this->getSpace();
        if ($space->getId() < 512) {
            throw new Exception('Disabled for system spaces');
        }

        $this->getClient()->call('box.space.' . $space->getName() . ':truncate');
    }
}
