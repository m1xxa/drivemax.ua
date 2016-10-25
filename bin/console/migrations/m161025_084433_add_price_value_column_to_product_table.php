<?php

use yii\db\Migration;

/**
 * Handles adding price_value to table `product`.
 */
class m161025_084433_add_price_value_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'price_value', $this->float());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'price_value');
    }
}
