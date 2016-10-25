<?php

use yii\db\Migration;

/**
 * Handles adding currency_caption to table `currency`.
 */
class m161025_092205_add_currency_caption_column_to_currency_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('currency', 'currency_caption', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('currency', 'currency_caption');
    }
}
