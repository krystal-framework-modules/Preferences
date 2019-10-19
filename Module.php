<?php

namespace Preferences;

use Krystal\Application\Module\AbstractModule;
use Preferences\Service\GroupService;
use Preferences\Service\ItemService;

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
            // Groups
            '/admin/groups' => array(
                'controller' => 'Admin:Group@indexAction'
            ),
            '/admin/groups/add' => array(
                'controller' => 'Admin:Group@addAction'
            ),
            '/admin/groups/edit/(:var)' => array(
                'controller' => 'Admin:Group@editAction'
            ),
            '/admin/groups/delete/(:var)' => array(
                'controller' => 'Admin:Group@deleteAction'
            ),
            '/admin/groups/save' => array(
                'controller' => 'Admin:Group@saveAction'
            ),

            // Items
            '/admin/items/add' => array(
                'controller' => 'Admin:Item@addAction'
            ),
            '/admin/items/edit/(:var)' => array(
                'controller' => 'Admin:Item@editAction'
            ),
            '/admin/items/delete/(:var)' => array(
                'controller' => 'Admin:Item@deleteAction'
            ),
            '/admin/items/save' => array(
                'controller' => 'Admin:Item@saveAction'
            )
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
            'groupService' => new GroupService($this->createMapper('\Preferences\Storage\MySQL\GroupMapper')),
            'itemService' => new ItemService($this->createMapper('\Preferences\Storage\MySQL\ItemMapper')),
        );
    }
}
