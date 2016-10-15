<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category`.
 */
class m161015_145622_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string(60)->notNull(),
            'parent_id' => $this->integer(),
            'photo' => $this->string(),
            'alias' => $this->string(60)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
