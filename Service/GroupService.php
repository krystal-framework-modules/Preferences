<?php

namespace Preferences\Service;

use Krystal\Application\Model\AbstractService;
use Krystal\Stdlib\VirtualEntity;
use Krystal\Stdlib\ArrayUtils;
use Preferences\Storage\MySQL\GroupMapper;

final class GroupService extends AbstractService
{
    /**
     * Any compliant mapper
     * 
     * @var \Preferences\Storage\MySQL\GroupMapper
     */
    private $groupMapper;

    /**
     * State initialization
     * 
     * @param \Preferences\Storage\MySQL\GroupMapper $groupMapper
     * @return void
     */
    public function __construct(GroupMapper $groupMapper)
    {
        $this->groupMapper = $groupMapper;
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
     * Fetch a hash-map of groups
     * 
     * @return array
     */
    public function fetchList()
    {
        return ArrayUtils::arrayList($this->groupMapper->fetchAll(false), 'id', 'name');
    }

    /**
     * Fetch all groups
     * 
     * @param boolean $sort Whether sorting is required
     * @return array
     */
    public function fetchAll($sort)
    {
        return $this->groupMapper->fetchAll($sort);
    }

    /**
     * Fetch single record by its id
     * 
     * @param int $id Record id
     * @return mixed
     */
    public function fetchById($id)
    {
        return $this->groupMapper->findByPk($id);
    }

    /**
     * Deletes a record by its id
     * 
     * @param int $id Record id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->groupMapper->deleteByPk($id);
    }

    /**
     * Persists (i.e saves or updates) a record
     * 
     * @param array $input Request data
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->groupMapper->persist($input);
    }
}
