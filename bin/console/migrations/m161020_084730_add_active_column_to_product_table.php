<?php

use yii\db\Migration;

/**
 * Handles adding active to table `product`.
 */
class m161020_084730_add_active_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'active', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'active');
    }
}
