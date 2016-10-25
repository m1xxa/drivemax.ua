<?php

use yii\db\Migration;

/**
 * Handles dropping price_id from table `product`.
 */
class m161025_091127_drop_price_id_column_from_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('product', 'price_id');
    }

    public function down()
    {
        $this->addColumn('product', 'price_id', $this->integer());
    }
}
