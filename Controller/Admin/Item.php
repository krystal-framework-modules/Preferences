<?php

namespace Preferences\Controller\Admin;

use Site\Controller\AbstractSiteController;
use Krystal\Stdlib\VirtualEntity;

final class Item extends AbstractSiteController
{
    /**
     * Renders a form
     * 
     * @param mixed $entity
     * @return string
     */
    private function createForm($item)
    {
        return $this->view->render('admin/form.item', [
            'item' => $item,
            'groups' => $this->getModuleService('groupService')->fetchList(),
            'values' => $item ? $this->getModuleService('valueService')->fetchAll($item['id'], false) : []
        ]);
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
        $item = $this->getModuleService('itemService')->fetchById($id);

        if ($item) {
            return $this->createForm($item);
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
        // Handle persisting here ...
        $input = $this->request->getPost();

        $this->getModuleService('itemService')->save($input);

        $this->flashBag->set('success', !empty($input['id']) ? 'An item has been updated successfully' : 'An item has been created successfully');
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
        if ($this->getModuleService('itemService')->deleteById($id)) {
            $this->flashBag->set('success', 'An item has been deleted successfully');
            $this->response->back();
        }
    }
}
