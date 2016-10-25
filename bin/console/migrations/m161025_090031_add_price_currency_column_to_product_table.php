<?php

use yii\db\Migration;

/**
 * Handles adding price_currency to table `product`.
 */
class m161025_090031_add_price_currency_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'price_currency', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'price_currency');
    }
}
