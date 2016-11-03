<?php

use yii\db\Migration;

class m161101_094945_add_column_to_cart_table extends Migration
{
    public function up()
    {
        $this->addColumn('cart', 'product_number', $this->string()->notNull());
        $this->addColumn('cart', 'product_name', $this->string()->notNull());
        $this->addColumn('cart', 'warehouse_id', $this->integer()->notNull());
        $this->addColumn('cart', 'qty', $this->integer()->notNull());
        $this->addColumn('cart', 'photo', $this->string()->notNull());

    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
