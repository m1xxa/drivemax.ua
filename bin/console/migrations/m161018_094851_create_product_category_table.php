<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_category`.
 */
class m161018_094851_create_product_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_category', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'category_id' => $this->integer(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_category');
    }
}
