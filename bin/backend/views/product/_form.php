<?php

use frontend\models\Category;
use frontend\models\Currency;
use frontend\models\Warehouse;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    model: <?=$model->category->category_id?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'product_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($category_model, 'category_id')->dropDownList(Category::find()->
    select(['name', 'category_id'])->indexBy('category_id')->column()) ?>

    <?= $form->field($model, 'active')->checkbox([1, 0]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_value')->textInput() ?>

    <?= $form->field($model, 'price_currency')->dropDownList(Currency::find()->
    select(['currency_name', 'currency_id'])->indexBy('currency_id')->column()) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'warehouse')->dropDownList(Warehouse::find()->
    select(['warehouse_name', 'warehouse_id'])->indexBy('warehouse_id')->column()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
