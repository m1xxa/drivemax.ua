<?php

use yii\db\Migration;

class m161101_094815_delete_column_to_cart_table extends Migration
{
    public function up()
    {
        $this->dropColumn('cart', 'product_number');
        $this->dropColumn('cart', 'product_name');
        $this->dropColumn('cart', 'warehouse_id');
        $this->dropColumn('cart', 'qty');
        $this->dropColumn('cart', 'photo');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
