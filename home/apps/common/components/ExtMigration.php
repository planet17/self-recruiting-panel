<?php /** User: planet17 Date: 12.04.16 Time: 19:39 */
namespace apps\common\components;
use yii\base\ErrorException;
use yii\db\Migration;
class ExtMigration extends Migration
{
    protected $tableName = null;

    protected function getTableName($prefix = true, $stringConcat = null)
    {
        if (is_null($this->tableName)) {
            throw new ErrorException('Undefined properties tableName');
        }
        return $prefix ? '{{%' . $this->tableName . ($stringConcat !== null ? '_' . $stringConcat : '') . '}}' : $this->tableName;
    }

    protected function helperAddForeignKey($tableName, $fieldName, $foreignTableName, $foreignFieldName = 'id', $addForIfk = '')
    {
        $this->createIndex($fieldName . '_ifk_' . $addForIfk, $tableName, $fieldName);
        $this->addForeignKey($fieldName . '_ifk_' . $addForIfk, $tableName, $fieldName, $foreignTableName, $foreignFieldName,
            'CASCADE', 'CASCADE');
    }

    protected function helperAddIndexes($tableName, $fieldName)
    {
        $this->createIndex($fieldName . '_idx', $tableName, $fieldName);
    }
}