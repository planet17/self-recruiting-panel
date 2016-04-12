<?php use apps\common\components\ExtMigration; use yii\helpers\ArrayHelper;
/** Handles the creation for table `companies`. */
class m160411_183349_create_companies extends ExtMigration
{
    protected $tableName = 'companies';
    /** @inheritdoc */
    public function up()
    {
        $tableOptions = ($this->db->driverName === 'mysql') ?
            'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null;

        $this->createTable(self::getTableName(), [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(32)->notNull(),
            'link_visible'      => $this->string(32),
            'link_real'         => $this->string(128),
            'image_filename'    => $this->string(16),
        ], $tableOptions);
        $data = [
            (['name' => 'Company one', 'link_visible' => 'c-one.com', 'link_real' => 'http://www.c-one.com', 'image_filename' => 'c_family.png']),
            (['name' => 'Company Two', 'link_visible' => 'c-two.com.ua', 'link_real' => 'http://c-two.ua']),
            (['name' => 'Company Three', 'link_visible' => 'c-3.od.ua', 'link_real' => 'http://c-3.od.ua']),
            (['name' => 'Company Four', 'link_visible' => 'c-fo.net', 'link_real' => 'http://c-two.ua']),
            (['name' => 'Company Five', 'link_visible' => 'c5.od.ua', 'link_real' => 'http://c5.net'])
        ];
        foreach ($data as $row) {
            $this->insert(self::getTableName(), [
                    'name'              => ArrayHelper::getValue($row, 'name'),
                    'link_visible'      => ArrayHelper::getValue($row, 'link_visible'),
                    'link_real'         => ArrayHelper::getValue($row, 'link_real'),
                    'image_filename'    => ArrayHelper::getValue($row, 'image_filename'),
            ]);
        } unset($data, $row);

        $this->createTable(self::getTableName(true, '_info'), [
            'id'            => $this->primaryKey(),
            'company_id'    => $this->integer()->notNull(),
            'm_points'      => $this->integer(4),
            'short_info'    => $this->string(32),
            'contact'       => $this->string(256),
        ], $tableOptions);

        $this->createIndex('company_id_ifk', self::getTableName(true, '_info'), 'company_id');
        $this->addForeignKey('company_id_ifk', self::getTableName(true, '_info'), 'company_id', self::getTableName(), 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('m_points_idx', self::getTableName(true, '_info'), 'm_points');

        $data = [
            (['company_id' => 1, 'link_visible' => 'c-one.com', 'link_real' => 'http://www.c-one.com', 'image_filename' => 'c_family.png']),
            (['company_id' => 2, 'link_visible' => 'c-two.com.ua', 'link_real' => 'http://c-two.ua']),
            (['company_id' => 3, 'link_visible' => 'c-3.od.ua', 'link_real' => 'http://c-3.od.ua']),
            (['company_id' => 4, 'link_visible' => 'c-fo.net', 'link_real' => 'http://c-two.ua']),
            (['company_id' => 5, 'link_visible' => 'c5.od.ua', 'link_real' => 'http://c5.net'])
        ];
        foreach ($data as $row) {
            $this->insert(self::getTableName(), [
                'company_id'        => ArrayHelper::getValue($row, 'company_id'),
                'link_visible'      => ArrayHelper::getValue($row, 'link_visible'),
                'link_real'         => ArrayHelper::getValue($row, 'link_real'),
                'image_filename'    => ArrayHelper::getValue($row, 'image_filename'),
            ]);
        } unset($data, $row);
        unset($tableOptions);
    }

    /** @inheritdoc */
    public function down() {
        $this->dropTable(self::getTableName(true, '_info'));
        $this->dropTable(self::getTableName());
    }
}