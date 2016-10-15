<?php

namespace frontend\controllers;


use app\models\Catalog;

class CatalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Catalog::find()->where(['parent_id' => 0])->all();
        return $this->render('index');
    }



}
