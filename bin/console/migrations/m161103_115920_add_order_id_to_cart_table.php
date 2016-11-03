<?php

use yii\db\Migration;

class m161103_115920_add_order_id_to_cart_table extends Migration
{
    public function up()
    {
        $this->addColumn('cart', 'order_id', $this->integer()->notNull());

    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
