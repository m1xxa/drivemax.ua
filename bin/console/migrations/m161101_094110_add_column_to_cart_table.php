<?php

use yii\db\Migration;

class m161101_094110_add_column_to_cart_table extends Migration
{
    public function up()
    {
        $this->addColumn('cart', 'product_number', $this->string());
        $this->addColumn('cart', 'product_name', $this->string());
        $this->addColumn('cart', 'warehouse_id', $this->string());
        $this->addColumn('cart', 'qty', $this->string());
        $this->addColumn('cart', 'photo', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
