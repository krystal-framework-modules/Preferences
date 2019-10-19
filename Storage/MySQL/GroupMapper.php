<?php

namespace Preferences\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class GroupMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('user_pref_groups');
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
     * Fetch all groups
     * 
     * @param boolean $sort Whether sorting is required
     * @return array
     */
    public function fetchAll($sort)
    {
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->orderBy($sort ? 'order' : array('id' => 'DESC'));

        return $db->queryAll();
    }
}
