<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $id
 * @property integer $warehouse_id
 * @property string $warehouse_name
 * @property integer $warehouse_wait_days
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'warehouse_name', 'warehouse_wait_days'], 'required'],
            [['warehouse_id', 'warehouse_wait_days'], 'integer'],
            [['warehouse_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehouse_id' => 'Warehouse ID',
            'warehouse_name' => 'Warehouse Name',
            'warehouse_wait_days' => 'Warehouse Wait Days',
        ];
    }
}
