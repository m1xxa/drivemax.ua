<?php

use yii\db\Migration;

/**
 * Handles adding warehouse to table `product`.
 */
class m161020_085114_add_warehouse_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'warehouse', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'warehouse');
    }
}
