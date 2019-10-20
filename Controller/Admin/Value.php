<?php

namespace Preferences\Controller\Admin;

use Site\Controller\AbstractSiteController;
use Krystal\Stdlib\VirtualEntity;

final class Value extends AbstractSiteController
{
    /**
     * Renders a form
     * 
     * @param mixed $entity
     * @return string
     */
    private function createForm($entity)
    {
        return $this->view->render('admin/form.value', array(
            'value' => $entity
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
        $value = $this->getModuleService('valueService')->fetchById($id);

        if ($value) {
            return $this->createForm($value);
        } else {
            return false;
        }
    }

    /**
     * Renders add form
     * 
     * @param int $itemId
     * @return string
     */
    public function addAction($itemId)
    {
        $value = new VirtualEntity();
        $value->setItemId($itemId);

        return $this->createForm($value);
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

        $this->getModuleService('valueService')->save($input);

        $this->flashBag->set('success', !empty($input['id']) ? 'A value has been updated successfully' : 'A value has been created successfully');
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
        if ($this->getModuleService('valueService')->deleteById($id)) {
            $this->flashBag->set('success', 'An item has been deleted successfully');
            $this->response->back();
        }
    }
}
