<?php

use yii\db\Migration;

/**
 * Handles adding alias to table `product`.
 */
class m161019_125204_add_alias_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'alias', $this->string()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'alias');
    }
}
