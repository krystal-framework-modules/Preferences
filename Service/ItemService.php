<?php

namespace Preferences\Service;

use Krystal\Application\Model\AbstractService;
use Krystal\Stdlib\VirtualEntity;
use Preferences\Storage\MySQL\ItemMapper;

final class ItemService extends AbstractService
{
    /**
     * Any compliant mapper
     * 
     * @var \Preferences\Storage\MySQL\ItemMapper
     */
    private $itemMapper;

    /**
     * State initialization
     * 
     * @param \Preferences\Storage\MySQL\ItemMapper $itemMapper
     * @return void
     */
    public function __construct(ItemMapper $itemMapper)
    {
        $this->itemMapper = $itemMapper;
    }

    /**
     * Converts raw row into entity object
     * 
     * @return mixed
     */
    protected function toEntity(array $row)
    {
        return false;
    }

    /**
     * Fetch all items associated with group id
     * 
     * @param int $groupId
     * @param boolean $sort Whether sorting is required
     * @return array
     */
    public function fetchAll($groupId, $sort)
    {
        return $this->itemMapper->fetchAll($groupId, $sort);
    }

    /**
     * Fetch single record by its id
     * 
     * @param int $id Record id
     * @return mixed
     */
    public function fetchById($id)
    {
        return $this->itemMapper->findByPk($id);
    }

    /**
     * Deletes a record by its id
     * 
     * @param int $id Record id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->itemMapper->deleteByPk($id);
    }

    /**
     * Persists (i.e saves or updates) a record
     * 
     * @param array $input Request data
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->itemMapper->persist($input);
    }
}
