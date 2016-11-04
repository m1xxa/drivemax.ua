<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div> Заказ номер:

    <?=Yii::$app->session->get('order_id')?>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'photo',
        'product_number',
        'product_name',
        'price',
        'count',
        'warehouse_id',

    ],
]); ?>

<?=Html::a('Очистить корзину', Url::to('@web/catalog/cart-clear'), ['class' => 'btn btn-info']);
