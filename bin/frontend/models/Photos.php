<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property integer $id
 * @property integer $photo_id
 * @property string $photo_name
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_id', 'photo_name'], 'required'],
            [['photo_id'], 'integer'],
            [['photo_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_id' => 'Photo ID',
            'photo_name' => 'Photo Name',
        ];
    }
}
