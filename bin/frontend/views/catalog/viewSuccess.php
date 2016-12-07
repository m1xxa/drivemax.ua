<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '"ДрайвМакс" - интернет магазин запчастей для иномарок.';
?>

<div class="success">Ваш заказ оформлен.</div>
<br>
<div>Вы заказали: </div>

<div class="container-fluid">
<?foreach ($products as $product):?>
    <div class="row">
        <div class="col-lg-2"><?=$product->product_number?></div>
        <div class="col-lg-3"><?=$product->product_name?></div>
        <div class="col-lg-1"><?=$product->count?>шт</div>
        <div class="col-lg-1"><?=$product->price?>грн</div>
    </div>
<?endforeach?>
</div>

    <br>

<div>с доставкой в город <?=$model->city?>. Получатель <?=$model->lastname?>
    <?=$model->firstname?>, номер телефона <?=$model->phone?></div>
    <br>
    <br>
<div class="success-endline">Ожидайте звонка. Наши менеджеры свяжутся с Вами в ближайшее время.</div>

<?=Html::a('На главную', Url::to('@web/'), ['class' => 'btn btn-info']);?>