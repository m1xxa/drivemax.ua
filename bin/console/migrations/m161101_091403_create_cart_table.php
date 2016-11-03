<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cart`.
 */
class m161101_091403_create_cart_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'price' => $this->float()->notNull(),
            'count' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cart');
    }
}
