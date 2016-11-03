<?php

use yii\db\Migration;

class m161103_140747_add_column_to_order_products extends Migration
{
    public function up()
    {
        $this->addColumn('order_products', 'product_number', $this->string()->notNull());
        $this->addColumn('order_products', 'price', $this->float()->notNull());
        $this->addColumn('order_products', 'product_name', $this->string()->notNull());
        $this->addColumn('order_products', 'warehouse_id', $this->integer()->notNull());
        $this->addColumn('order_products', 'count', $this->integer()->notNull());
        $this->addColumn('order_products', 'photo', $this->string()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
