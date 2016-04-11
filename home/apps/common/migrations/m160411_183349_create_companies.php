<?php

use yii\db\Migration;

/**
 * Handles the creation for table `companies`.
 */
class m160411_183349_create_companies extends Migration
{
    const tableName = '{{%companies}}';
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
