<?php

namespace Asapo\DailyHub\SuluBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DailyHubBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(parent::getPath());
    }
}
