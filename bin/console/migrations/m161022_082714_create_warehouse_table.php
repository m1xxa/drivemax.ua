<?php

use yii\db\Migration;

/**
 * Handles the creation for table `warehouse`.
 */
class m161022_082714_create_warehouse_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('warehouse', [
            'id' => $this->primaryKey(),
            'warehouse_id' => $this->integer()->notNull(),
            'warehouse_name' => $this->string(20)->notNull(),
            'warehouse_wait_days' => $this->integer()->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('warehouse');
    }
}
