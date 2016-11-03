<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'product_number',
        'price',
        'product_name',

    ],
]); ?>

<?=Html::a('Очистить корзину', Url::to('@web/catalog/cart-clear'), ['class' => 'btn btn-info']);
