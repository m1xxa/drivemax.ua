<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'delivery_id')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'delivery_warehouse')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>