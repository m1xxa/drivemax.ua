<?php
?>

<div>Заказ оформлен.</div>
<div>Вы заказали: </div>

<div class="container">
<? use yii\helpers\Html;
use yii\helpers\Url;

foreach ($products as $product):?>
    <div class="row">
        <div class="col-lg-2"><?=$product->product_number?></div>
        <div class="col-lg-3"><?=$product->product_name?></div>
        <div class="col-lg-1"><?=$product->count?>шт</div>
        <div class="col-lg-1"><?=$product->price?>грн</div>
    </div>
<?endforeach?>
</div>

<div>с доставкой в город <?=$model->city?> на склад <?=$model->delivery_warehouse?> <?=$model->delivery_id?></div>
<div>получатель <?=$model->lastname?> <?=$model->firstname?>, номер телефона <?=$model->phone?></div>
<div>Ожидайте звонка. Наши менеджеры свяжутся с Вами в ближайшее время.</div>

<?=Html::a('На главную', Url::to('@web/'), ['class' => 'btn btn-info']);?>