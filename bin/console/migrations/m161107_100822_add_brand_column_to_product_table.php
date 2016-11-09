<?php

use yii\db\Migration;

/**
 * Handles adding brand to table `product`.
 */
class m161107_100822_add_brand_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'brand', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
