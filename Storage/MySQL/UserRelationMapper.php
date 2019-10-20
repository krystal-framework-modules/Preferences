<?php

namespace Preferences\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class UserRelationMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('user_pref_groups_relation');
    }
}
