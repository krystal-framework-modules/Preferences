<?php

namespace Preferences\Service;

use Krystal\Application\Model\AbstractService;
use Krystal\Stdlib\VirtualEntity;
use Preferences\Storage\MySQL\ValueMapper;

final class ValueService extends AbstractService
{
    /**
     * Any compliant mapper
     * 
     * @var \Preferences\Storage\MySQL\ValueMapper
     */
    private $valueMapper;

    /**
     * State initialization
     * 
     * @param \Preferences\Storage\MySQL\ValueMapper $valueMapper
     * @return void
     */
    public function __construct(ValueMapper $valueMapper)
    {
        $this->valueMapper = $valueMapper;
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
     * Fetch all values by associated item id
     * 
     * @param int $itemId
     * @param boolean $sort Whether sorting is required
     * @return array
     */
    public function fetchAll($itemId, $sort)
    {
        return $this->valueMapper->fetchAll($itemId, $sort);
    }

    /**
     * Fetch single record by its id
     * 
     * @param int $id Record id
     * @return mixed
     */
    public function fetchById($id)
    {
        return $this->valueMapper->findByPk($id);
    }

    /**
     * Deletes a record by its id
     * 
     * @param int $id Record id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->valueMapper->deleteByPk($id);
    }

    /**
     * Persists (i.e saves or updates) a record
     * 
     * @param array $input Request data
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->valueMapper->persist($input);
    }
}
