<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_number') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_description') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'warehouse') ?>

    <?php // echo $form->field($model, 'price_id') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
