<?php

use yii\db\Migration;

class m161212_113024_add_glass_table extends Migration
{
    public function up()
    {
        $this->createTable('glass', [
            'id' => $this->primaryKey(),
            'euro_cod' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'kuzov' => $this->string(),
            'years' => $this->string(),
            'size' => $this->string(),
            'params' => $this->string(),
            'brand' => $this->string(),
            'color' => $this->string(),
            'price' => $this->integer(),
            'alias' => $this->string(60)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('glass');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
