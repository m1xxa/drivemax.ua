<?php

use yii\db\Migration;

/**
 * Handles the creation for table `currency`.
 */
class m161025_090104_create_currency_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'currency_id' => $this->integer()->notNull(),
            'currency_name' => $this->string()->notNull(),
            'currency_picture' => $this->string(),
            'currency_value' => $this->float()->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('currency');
    }
}
