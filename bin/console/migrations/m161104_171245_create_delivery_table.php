<?php

use yii\db\Migration;

/**
 * Handles the creation for table `delivery`.
 */
class m161104_171245_create_delivery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('delivery', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'info' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('delivery');
    }
}
