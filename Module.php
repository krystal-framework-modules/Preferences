<?php

namespace Preferences;

use Krystal\Application\Module\AbstractModule;
use Preferences\Service\GroupService;
use Preferences\Service\ItemService;
use Preferences\Service\ValueService;

final class Module extends AbstractModule
{
    /**
     * Returns routes of this module
     * 
     * @return array
     */
    public function getRoutes()
    {
        return include(__DIR__ . '/Config/routes.php');
    }

    /**
     * Returns prepared service instances of this module
     * 
     * @return array
     */
    public function getServiceProviders()
    {
        return array(
            'groupService' => new GroupService($this->createMapper('\Preferences\Storage\MySQL\GroupMapper')),
            'itemService' => new ItemService($this->createMapper('\Preferences\Storage\MySQL\ItemMapper')),
            'valueService' => new ValueService($this->createMapper('\Preferences\Storage\MySQL\ValueMapper'))
        );
    }
}
