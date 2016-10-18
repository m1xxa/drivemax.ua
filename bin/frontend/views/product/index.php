<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<h1>product/view</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.



</p>


<div class="name">
    Наименование: <?=$item->product_name;?>
</div>

<div class="photo">
    <?=Html::img('@web/images/' . $item->photo->photo_name, ['width' => 300]);?>
</div>

<div class="description">
    Описание: <?=$item->product_description;?>
</div>