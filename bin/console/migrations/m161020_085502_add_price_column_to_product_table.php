<?php

use yii\db\Migration;

/**
 * Handles adding price to table `product`.
 */
class m161020_085502_add_price_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'price_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'price_id');
    }
}
