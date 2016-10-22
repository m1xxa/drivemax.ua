<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <?= $form->field($model, 'id') ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'category_id') ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'parent_id') ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'photo') ?>
            </div>
        </div>

    </div>










    <?php // echo $form->field($model, 'alias') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
