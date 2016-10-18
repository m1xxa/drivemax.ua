<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_photo".
 *
 * @property integer $product_id
 * @property integer $photo_id
 */
class ProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'photo_id' => 'Photo ID',
        ];
    }
}
