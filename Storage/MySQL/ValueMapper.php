<?php

namespace Preferences\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class ValueMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('user_pref_groups_items_values');
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
     * Fetch all values by associated item id
     * 
     * @param int $itemId
     * @param boolean $sort Whether sorting is required
     * @return array
     */
    public function fetchAll($itemId, $sort)
    {
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->whereEquals('item_id', $itemId)
                       ->orderBy($sort ? 'order' : array('id' => 'DESC'));

        return $db->queryAll();
    }
}
