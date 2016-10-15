<?php

use yii\db\Migration;

/**
 * Handles the creation for table `catalog`.
 */
class m161015_145544_create_catalog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog', [
            'id' => $this->primaryKey(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog');
    }
}
