<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "glass".
 *
 * @property integer $id
 * @property integer $euro_cod
 * @property string $name
 * @property string $kuzov
 * @property string $years
 * @property string $size
 * @property string $params
 * @property string $brand
 * @property string $color
 * @property integer $price
 * @property string $alias
 */
class Glass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'glass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['euro_cod', 'name', 'alias'], 'required'],
            [['euro_cod', 'price'], 'integer'],
            [['name', 'kuzov', 'years', 'size', 'params', 'brand', 'color'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'euro_cod' => 'Евро код',
            'name' => 'Наименование',
            'kuzov' => 'Тип кузова',
            'years' => 'Года',
            'size' => 'Размеры',
            'params' => 'Параметры',
            'brand' => 'Производитель',
            'color' => 'Цвет',
            'price' => 'Цена в грн',
            'alias' => 'Alias',
        ];
    }
}
