<?php

namespace frontend\controllers;

use app\models\Category;


class CatalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($category){
        $categoryId = Category::find()->where(['alias' => $category])->one();
        $model = Category::find()->where(['parent_id' => $categoryId->category_id])->all();
        return $this->render('index', ['model' => $model, 'categoryid' => $categoryId]);
    }




}
