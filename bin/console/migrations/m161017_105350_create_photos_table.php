<?php

use yii\db\Migration;

/**
 * Handles the creation for table `photos`.
 */
class m161017_105350_create_photos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('photos', [
            'id' => $this->primaryKey(),
            'photo_id' => $this->integer()->notNull(),
            'photo_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('photos');
    }
}
