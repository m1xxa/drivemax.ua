<?php

use yii\db\Migration;

/**
 * Handles the creation for table `price`.
 */
class m161023_170854_create_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('price', [
            'id' => $this->primaryKey(),
            'price_id' => $this->integer()->notNull(),
            'price_value' => $this->integer()->notNull(),
            'price_currency' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('price');
    }
}
