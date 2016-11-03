<?php

use yii\db\Migration;

/**
 * Handles the creation for table `orders`.
 */
class m161103_131915_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'lastname' => $this->string(),
            'firstname' => $this->string(),
            'phone' => $this->string(),
            'city' => $this->string(),
            'delivery_id' => $this->integer(),
            'delivery_warehouse' => $this->integer(),
            'status' => $this->boolean()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orders');
    }
}
