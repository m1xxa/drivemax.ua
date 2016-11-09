<?php

use yii\db\Migration;

/**
 * Handles adding brand to table `order_product`.
 */
class m161107_104630_add_brand_column_to_order_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('order_products', 'brand', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
