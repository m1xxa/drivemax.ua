<?php

use yii\db\Migration;

class m161027_162458_reformat_product_photo_table extends Migration
{
    public function up()
    {
        $this->dropColumn('product_photo', 'product_id');
        $this->addColumn('product_photo', 'id', $this->primaryKey());
        $this->addColumn('product_photo', 'product_id', $this->integer());
    }

    public function down()
    {
    }
}
