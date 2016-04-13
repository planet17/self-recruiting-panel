<?php use apps\common\components\ExtMigration;
/** Handles the creation for table `companies`. */
class m160411_183349_create_technologies extends ExtMigration
{
    protected $tableName = 'technologies';
    private $tableDataInsert = [];
    private function prepareInsertData($name) { array_push($this->tableDataInsert, ['name' => $name]); }
    /** @inheritdoc */ public function up()
    {
        $tableOptions = ($this->db->driverName === 'mysql') ?
            'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null;
        $this->createTable(self::getTableName(), [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull()
        ], $tableOptions);
        $this->helperAddIndexes(self::getTableName(), 'name');
        $this->prepareInsertData('PHP');
        $this->prepareInsertData('Javascript');
        $this->prepareInsertData('Scala');
        $this->prepareInsertData('Python');
        $this->prepareInsertData('Ruby');
        foreach($this->tableDataInsert as $row){$this->insert(self::getTableName(),$row);}unset($row);
    }
    /** @inheritdoc */ public function down() { $this->dropTable(self::getTableName()); }
}