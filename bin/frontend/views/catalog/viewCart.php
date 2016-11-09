<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div> Заказ номер:

    <?=Yii::$app->session->get('order_id')?>
</div>

<div class="container">

    <div class="row">
        <div class="col-lg-1">Фото</div>
        <div class="col-lg-1">Номер</div>
        <div class="col-lg-3">Наименование</div>
        <div class="col-lg-1">Бренд</div>
        <div class="col-lg-1">Цена</div>
        <div class="col-lg-1">Кол-во</div>
        <div class="col-lg-2">Отправка через</div>
        <div class="col-lg-2">Действия</div>
    </div>

    <?foreach ($orderProducts as $orderProduct):?>
    <div class="row">
        <div class="col-lg-1"><?=$orderProduct->photo;?></div>
        <div class="col-lg-1"><?=$orderProduct->product_number;?></div>
        <div class="col-lg-3"><?=$orderProduct->product_name;?></div>
        <div class="col-lg-1"><?=$orderProduct->brand;?></div>
        <div class="col-lg-1"><?=$orderProduct->price;?> грн</div>
        <div class="col-lg-1"><?=$orderProduct->count;?> шт</div>
        <div class="col-lg-2">Отправка через: <?=$orderProduct->warehouse->warehouse_wait_days;?> дня</div>
        <div class="col-lg-2"><?=Html::a('Удалить из корзины', Url::to('@web/catalog/delete/' . $orderProduct->product_id))?></div>
    </div>
    <?endforeach?>
</div>

<div class="text-right">
    <?=Html::a('Очистить корзину', Url::to('@web/catalog/cart-clear'), ['class' => 'btn btn-info']);?>
</div>


<div class="text-center">
    <?=Html::a('Оформить заказ', Url::to('@web/order'), ['class' => 'btn btn-warning']);?>
</div>
