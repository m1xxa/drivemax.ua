<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_photo`.
 */
class m161018_094842_create_product_photo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_photo', [
            'product_id' => $this->primaryKey(),
            'photo_id' => $this->integer(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_photo');
    }
}
