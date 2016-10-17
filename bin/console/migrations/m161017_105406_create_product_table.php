<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product`.
 */
class m161017_105406_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'product_number' => $this->string(),
            'product_name' => $this->string(90)->notNull(),
            'product_description' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
