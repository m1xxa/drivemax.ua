<?php

use yii\db\Migration;

/**
 * Handles adding qty to table `product`.
 */
class m161020_085849_add_qty_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'qty', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'qty');
    }
}
