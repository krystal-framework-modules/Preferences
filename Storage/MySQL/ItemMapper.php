<?php

namespace Preferences\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class ItemMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('user_pref_groups_items');
    }

    /**
     * Returns primary column name for current mapper
     * 
     * @return string
     */
    protected function getPk()
    {
        return 'id';
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
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->whereEquals('group_id', $groupId)
                       ->orderBy($sort ? 'order' : array('id' => 'DESC'));

        return $db->queryAll();
    }
}
