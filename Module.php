<?php

namespace Preferences;

use Krystal\Application\Module\AbstractModule;
use Preferences\Service\GroupService;

final class Module extends AbstractModule
{
    /**
     * Returns routes of this module
     * 
     * @return array
     */
    public function getRoutes()
    {
        return array(
        );
    }

    /**
     * Returns prepared service instances of this module
     * 
     * @return array
     */
    public function getServiceProviders()
    {
        return array(
            'groupService' => new GroupService($this->createMapper('\Preferences\Storage\MySQL\GroupMapper'))
        );
    }
}
