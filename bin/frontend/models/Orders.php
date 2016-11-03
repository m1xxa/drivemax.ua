<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property string $phone
 * @property string $city
 * @property integer $delivery_id
 * @property integer $delivery_warehouse
 * @property integer $status
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id', 'delivery_warehouse', 'status'], 'integer'],
            [['status'], 'required'],
            [['lastname', 'firstname', 'phone', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'phone' => 'Phone',
            'city' => 'City',
            'delivery_id' => 'Delivery ID',
            'delivery_warehouse' => 'Delivery Warehouse',
            'status' => 'Status',
        ];
    }

    public function getOrderProducts(){
        return $this->hasMany(Product::className(), ['product_id' => 'product_id']);
    }
}
