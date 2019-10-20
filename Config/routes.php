<?php

return [
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
    ),

    // Value
    '/admin/values/add/(:var)' => array(
        'controller' => 'Admin:Value@addAction'
    ),
    '/admin/values/edit/(:var)' => array(
        'controller' => 'Admin:Value@editAction'
    ),
    '/admin/values/delete/(:var)' => array(
        'controller' => 'Admin:Value@deleteAction'
    ),
    '/admin/values/save' => array(
        'controller' => 'Admin:Value@saveAction'
    )
];
