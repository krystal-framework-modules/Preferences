<?php

namespace Preferences\Controller;

use Site\Controller\AbstractSiteController;
use Krystal\Stdlib\VirtualEntity;

final class UserPreferences extends AbstractSiteController
{
    /**
     * Renders data grid
     * 
     * @return string
     */
    public function indexAction()
    {
        $this->view->getPluginBag()->appendLastScript('@Preferences/pref.js');
        
        $groups = $this->getModuleService('valueService')->fetchComplete($this->getAuthService()->getId());

        return $this->view->render('profile/form', array(
            'groups' => $groups
        ));
    }

    /**
     * Saves a record
     * 
     * @return mixed
     */
    public function saveAction()
    {
        // Handle persisting here ...
        $this->getModuleService('valueService')->saveRelation($this->getAuthService()->getId(), $this->request->getPost());

        $this->flashBag->set('success', 'Settings have been updated');
        return 1;
    }
}
