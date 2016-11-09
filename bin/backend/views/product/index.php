<?php

use frontend\models\Category;
use frontend\models\Currency;
use frontend\models\Price;
use frontend\models\Photos;
use frontend\models\Product;
use frontend\models\Warehouse;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <? Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_number',
            'product_name',
            'brand',
            'active:boolean',
            'price_value',
            [
                'attribute' => 'price_currency',
                'filter' => Currency::find()->select(['currency_caption', 'currency_id'])
                    ->indexBy('currency_id')->column(),
                'value' => 'currency.currency_caption',
            ],
            'qty',
            [
                'attribute' => 'warehouse',
                'filter' => Warehouse::find()->select(['warehouse_name', 'warehouse_id'])->indexBy('warehouse_id')->column(),
                'value' => 'productWarehouse.warehouse_name',
            ],

            [
                'label' => 'Категория',
                'attribute' => 'category_id',
                'filter' => Category::find()->select(['name', 'category_id'])
                    ->indexBy('category_id')->column(),
                'value' => function (Product $product){
                    return ArrayHelper::getValue($product, 'category.name');
                }
            ],

            [
                'label' => 'Фото',
                'attribute' => 'photo_id',
                'value' => function (Product $product){
                    return ArrayHelper::getValue($product, 'photo.photo_name');
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <? Pjax::end();?>
</div>
