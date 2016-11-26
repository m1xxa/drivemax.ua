<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>

<div><?=Html::a("Edit category", [Url::to('catalog/')])?></div>
<div><?=Html::a("Edit products", [Url::to('product/')])?></div>

<div>Заказы</div>

<?foreach($orders as $order):?>

    <div class="container">
        <div class="row">
            <div class="col-lg-2">

                <?
                if(!$order->lastname == null) {

                    echo $order->lastname;
                }
                else echo 'Фамилия не заполнена'
                ?>

            </div>

            <div class="col-lg-2">
                <?=$order->firstname?>
            </div>
            <div class="col-lg-2">
                <?=$order->phone?>
            </div>
            <div class="col-lg-2">
                <?=$order->status?>
            </div>
        </div>
    </div>

<?endforeach?>
