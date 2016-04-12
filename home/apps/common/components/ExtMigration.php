<?php /** User: planet17 Date: 12.04.16 Time: 19:39 */
namespace apps\common\components;
use yii\base\ErrorException;
use yii\db\Migration;
class ExtMigration extends Migration
{
    protected $tableName = null;
    protected function getTableName($prefix = true, $stringConcat = null)
    {
        if (is_null($this->tableName)) { throw new ErrorException("Undefined properties tableName"); }
        return $prefix ? '{{%' . $this->tableName . ( $stringConcat !== null ? $stringConcat : "" ) . '}}' : $this->tableName;
    }
}