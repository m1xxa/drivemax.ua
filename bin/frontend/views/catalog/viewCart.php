<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Корзина. "ДрайвМакс" - интернет магазин запчастей для иномарок.';
?>

<div> Заказ номер:

    <?=Yii::$app->session->get('order_id')?>
</div>

<div class="container-fluid">

    <div class="row table-label-row">
        <div class="col-lg-1"><b>Фото</b></div>
        <div class="col-lg-4"><b>Наименование</b></div>
        <div class="col-lg-1"><b>Бренд</b></div>
        <div class="col-lg-1"><b>Цена</b></div>
        <div class="col-lg-1"><b>Кол-во</b></div>
        <div class="col-lg-2"><b>Отправка через</b></div>
        <div class="col-lg-2"><b>Действия</b></div>
    </div>

    <div class="product-table-separate"></div>

    <?foreach ($orderProducts as $orderProduct):?>
        <div class="container-fluid product-table">
            <div class="row product-table-row">
                <div class="col-lg-1"><?=Html::a(Html::img('@web/images/catalog/products/'
                        . $orderProduct->photo, ['width' => 80]),
                        Url::to('#myModal'), ['data-toggle' => 'modal']);?></div>
                <div class="col-lg-4">
                    <div class="number">Номер: <?=$orderProduct->product_number;?></div>
                    <div class="name"><?=$orderProduct->product_name;?></div>
                </div>
                <div class="col-lg-1"><?=$orderProduct->brand;?></div>
                <div class="col-lg-1"><?=$orderProduct->price;?> грн</div>
                <div class="col-lg-1">
                    <?php Pjax::begin(['enablePushState' => false]); ?>
                    <?=Html::a('-', '/cart/down/' . $orderProduct->id, ['class' => 'btn-info btn'])?>
                    <?=$orderProduct->count;?>
                    <?=Html::a('+', '/cart/up/' . $orderProduct->id, ['class' => 'btn-info btn'])?>
                    <?php Pjax::end(); ?>
                </div>
                <div class="col-lg-2">Отправка через: <?=$orderProduct->warehouse->warehouse_wait_days;?> дня</div>
                <div class="col-lg-2"><?=Html::a('Удалить из корзины', Url::to('@web/catalog/delete/' . $orderProduct->product_id))?></div>
            </div>
        </div>
    <?endforeach?>
</div>

<div class="text-right">
    <?=Html::a('Очистить корзину', Url::to('@web/catalog/cart-clear'), ['class' => 'btn btn-info']);?>
</div>


<div class="text-center">

    <?php
    if($isnullproducts) {
        echo Html::a('Корзина пуста. Перейти в каталог', Url::to('@web/'), ['class' => 'btn btn-warning']);
    }
    else {
        echo Html::a('Оформить заказ', Url::to('@web/order'), ['class' => 'btn btn-warning']);
    }
    ?>
</div>
