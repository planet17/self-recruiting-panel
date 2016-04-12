<?php /** User: planet17 Date: 12.04.16 Time: 19:39 */
namespace apps\common\commands;
use yii\db\Migration;
class ExtMigration extends Migration
{
    const tableName = 'tableName';
    public static function getTableName($prefix = true, $stringConcat = null)
    {
        return $prefix ? '{{%' . self::tableName . ( $stringConcat !== null ? $stringConcat : "" ) . '}}' : self::tableName;
    }
}