<?php

use yii\db\Migration;

/**
 * Handles the creation for table `companies_table`.
 */
class m160410_185658_create_users extends Migration
{
    const tableName = '{{%users}}';
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
            'email' => $this->string(32)->notNull(),
            'password_hash' => $this->string(60)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);


        $this->insert(self::tableName,array(
            'email'=>'demo@de.mo',
            'password_hash' =>'$2y$13$ugm8dOjX/6rC20YjO84hAOw0Du0zBdxxoLvmWp8pdSdpuO9xv7n3W',
            'auth_key' => 'YsWzMKyWnoTsWzJSKiA0uq1YgBMoTbqD',
            'created_at' => '2016-04-11 21:16:32',
            'updated_at' => '2016-04-11 21:16:32',
        ));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::tableName);
    }
}