<?php
use yii\grid\GridView;
?>


<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'product_id',
        'product_number',
        'product_name',
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