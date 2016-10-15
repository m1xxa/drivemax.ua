<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property integer $parent_id
 * @property string $photo
 * @property string $alias
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'alias'], 'required'],
            [['category_id', 'parent_id'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 60],
            [['photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'photo' => 'Photo',
            'alias' => 'Alias',
        ];
    }
}
