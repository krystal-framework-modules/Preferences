<?php

namespace Preferences\Controller\Admin;

use Site\Controller\AbstractSiteController;
use Krystal\Stdlib\VirtualEntity;

final class Group extends AbstractSiteController
{
    /**
     * Renders data grid
     * 
     * @return string
     */
    public function indexAction()
    {
        $itemService = $this->getModuleService('itemService');
        $groupService = $this->getModuleService('groupService');

        $groupId = $this->request->hasQuery('id') ? $this->request->getQuery('id') : $groupService->getLastId();

        return $this->view->render('admin/index', array(
            'groups' => $groupService->fetchAll(false),
            'groupId' => $groupId,
            'items' => $itemService->fetchAll($groupId, false)
        ));
    }

    /**
     * Renders a form
     * 
     * @param mixed $entity
     * @return string
     */
    private function createForm($group)
    {
        return $this->view->render('admin/form.group', array(
            'group' => $group
        ));
    }

    /**
     * Renders edit form
     * 
     * @param int $id Record id
     * @return mixed
     */
    public function editAction($id)
    {
        // Find a record by its id, then render a form by calling $this->createForm() here...
        $group = $this->getModuleService('groupService')->fetchById($id);

        if ($group) {
            return $this->createForm($group);
        } else {
            return false;
        }
    }

    /**
     * Renders add form
     * 
     * @return string
     */
    public function addAction()
    {
        return $this->createForm(new VirtualEntity());
    }

    /**
     * Saves a record
     * 
     * @return mixed
     */
    public function saveAction()
    {
        $input = $this->request->getPost();

        $this->getModuleService('groupService')->save($input);

        $this->flashBag->set('success', !empty($input['id']) ? 'A group has been updated successfully' : 'A group has been created successfully');
        return 1;
    }

    /**
     * Deletes a record by its id
     * 
     * @param int $id Record id
     * @return mixed
     */
    public function deleteAction($id)
    {
        if ($this->getModuleService('groupService')->deleteById($id)) {
            $this->flashBag->set('success', 'A group has been deleted successfully');
            $this->response->back();
        }
    }
}
