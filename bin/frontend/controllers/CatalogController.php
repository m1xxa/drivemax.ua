<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Product;


class CatalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($category){
        $categoryId = Category::find()->where(['alias' => $category])->one();
        $model = Category::find()->where(['parent_id' => $categoryId->category_id])->all();
        $products = Product::find()->join(['category'])->where(['alias' => $categoryId->alias])->all();
        return $this->render('index', ['model' => $model, 'products' => $products, 'categoryid' => $categoryId]);
    }

}
