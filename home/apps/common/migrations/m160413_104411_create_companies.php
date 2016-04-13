<?php use apps\common\components\ExtMigration;
/** Handles the creation for table `companies`. */
class m160413_104411_create_companies extends ExtMigration
{


    protected $tableName = 'companies';
    private $tableDataInsertMain = [];
    private $tableDataInsertInfo = [];
    private $tableDataInsertAddresses = [];
    private $tableDataInsertObjects = [];
    private $tableDataInsertObjectsViaTechnologies = [];


    private function prepareInsertMain($p1, $p2, $p3, $p4)
    {
        array_push($this->tableDataInsertMain, [
            'name'              => $p1,
            'link_visible'      => $p2,
            'link_real'         => $p3,
            'image_filename'    => $p4
        ]);
    }


    private function prepareInsertInfo($p1, $p2, $p3, $p4)
    {
        array_push($this->tableDataInsertInfo, [
            'company_id'    => $p1,
            'm_points'      => $p2,
            'short_info'    => $p3,
            'contact'       => $p4
        ]);
    }


    private function prepareInsertAddresses($p1, $p2, $p3, $p4)
    {
        array_push($this->tableDataInsertAddresses, [
            'company_id'    => $p1,
            'city'          => $p2,
            'country'       => $p3,
            'address'       => $p4
        ]);
    }

    private function prepareInsertObjects($p1, $p2, $p3)
    {
        array_push($this->tableDataInsertObjects, [
            'company_id'    => $p1,
            'position_name' => $p2,
            'details'       => $p3
        ]);
    }

    private function prepareInsertObjectsViaTechnologies($p1, $p2)
    {
        array_push($this->tableDataInsertObjectsViaTechnologies, [
            'object_id'     => $p1,
            'technology_id' => $p2
        ]);
    }


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
            'image_filename'    => $this->string(16)
        ], $tableOptions);
        $this->prepareInsertMain('Company one','c-one.com','http://www.c-one.com','c_family.png');
        $this->prepareInsertMain('Company Two','c-two.com.ua','http://c-two.ua',null);
        $this->prepareInsertMain('Company Three','c-3.od.ua','http://c-3.od.ua',null);
        $this->prepareInsertMain('Company Four','c-fo.net','http://c-two.ua',null);
        $this->prepareInsertMain('Company Five','c5.od.ua','http://c5.net',null);
        foreach($this->tableDataInsertMain as $row){$this->insert(self::getTableName(),$row);}unset($row);


        $this->createTable(self::getTableName(true, 'info'), [
            'id'            => $this->primaryKey(),
            'company_id'    => $this->integer()->notNull(),
            'm_points'      => $this->integer(4),
            'short_info'    => $this->string(32),
            'contact'       => $this->string(256)
        ], $tableOptions);
        $this->helperAddForeignKey(self::getTableName(true, 'info'),'company_id', self::getTableName(), 'id', '_info');
        $this->helperAddIndexes(self::getTableName(true, 'info'), 'm_points');
        $this->prepareInsertInfo(1,99,'Неудачно',null);
        $this->prepareInsertInfo(2,50,'> 2 лет',null);
        $this->prepareInsertInfo(3,101,'Диалог',null);
        $this->prepareInsertInfo(4,100,'Не пробовал',null);
        $this->prepareInsertInfo(5,100,'Отправлено',null);
        foreach($this->tableDataInsertInfo as $row){$this->insert(self::getTableName(true,'info'),$row);}unset($row);


        $this->createTable(self::getTableName(true, 'addresses'), [
            'id'            => $this->primaryKey(),
            'company_id'    => $this->integer()->notNull(),
            'country'       => $this->string(24),
            'city'          => $this->string(24),
            'address'       => $this->string(256)
        ], $tableOptions);
        $this->helperAddForeignKey(self::getTableName(true, 'addresses'),'company_id', self::getTableName(), 'id', '_addresses');
        $this->helperAddIndexes(self::getTableName(true, 'addresses'), 'country');
        $this->helperAddIndexes(self::getTableName(true, 'addresses'), 'city');
        $this->helperAddIndexes(self::getTableName(true, 'addresses'), 'address');
        $this->prepareInsertAddresses(1,'Украина','Одесса','Адмиральский проспект');
        $this->prepareInsertAddresses(2,'Украина','Одесса','Трц Афина');
        $this->prepareInsertAddresses(3,'Украина','Одесса','Морской бизнес-центр');
        $this->prepareInsertAddresses(4,'Украина','Одесса','Думская площадь');
        $this->prepareInsertAddresses(5,'Украина','Одесса','Екатерининская площадь');
        foreach($this->tableDataInsertAddresses as $row){$this->insert(self::getTableName(true,'addresses'),$row);}unset($row);

        $this->createTable(self::getTableName(true, 'objects'), [
            'id'                => $this->primaryKey(),
            'company_id'        => $this->integer()->notNull(),
            'position_name'     => $this->string(32)->notNull(),
            'details'           => $this->string(256)
        ], $tableOptions);
        $this->helperAddForeignKey(self::getTableName(true, 'objects'),'company_id', self::getTableName(), 'id', '_objects');
        $this->helperAddIndexes(self::getTableName(true, 'objects'), 'position_name');
        $this->prepareInsertObjects(1,'Full Stack Developer',null);
        $this->prepareInsertObjects(2,'Backend-developer PHP Senior',null);
        $this->prepareInsertObjects(3,'Developer',null);
        $this->prepareInsertObjects(4,'Developer',null);
        $this->prepareInsertObjects(5,'Developer',null);
        foreach($this->tableDataInsertObjects as $row){$this->insert(self::getTableName(true,'objects'),$row);}unset($row);

        $this->createTable(self::getTableName(true,'object_technologies'),['object_id'=>$this->integer()->notNull(),'technology_id'=>$this->integer()->notNull()], $tableOptions);
        $this->helperAddForeignKey(self::getTableName(true,'object_technologies'),'object_id', self::getTableName(true, 'objects'), 'id', '_object_technologies');
        $this->helperAddForeignKey(self::getTableName(true,'object_technologies'),'technology_id','{{%technologies}}', 'id', '_object_technologies');
        $this->prepareInsertObjectsViaTechnologies(1,1);
        $this->prepareInsertObjectsViaTechnologies(2,1);
        $this->prepareInsertObjectsViaTechnologies(3,1);
        $this->prepareInsertObjectsViaTechnologies(3,2);
        $this->prepareInsertObjectsViaTechnologies(4,1);
        $this->prepareInsertObjectsViaTechnologies(5,1);
        foreach($this->tableDataInsertObjectsViaTechnologies as $row){$this->insert(self::getTableName(true,'object_technologies'),$row);}unset($row);
        unset($tableOptions);
    }

    /** @inheritdoc */
    public function down() {
        $this->dropTable(self::getTableName(true, 'object_technologies'));
        $this->dropTable(self::getTableName(true, 'objects'));
        $this->dropTable(self::getTableName(true, 'addresses'));
        $this->dropTable(self::getTableName(true, 'info'));
        $this->dropTable(self::getTableName());
    }
}