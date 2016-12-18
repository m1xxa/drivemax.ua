<?php
use frontend\models\Delivery;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '"ДрайвМакс" - интернет магазин запчастей для иномарок.';
?>

<div class="catalog-caption">
    Введите свои данныые
</div>
<div class="order-user-info">
    <div class="order-caption">Данные получателя</div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="order-data">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="order-delivery-info">
    <div class="order-caption">Данные службы доставки</div>
    <div class="order-data">
        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'delivery_id')->dropDownList(Delivery::find()->select(['name', 'id'])
            ->indexBy('id')->column())?>
        <?= $form->field($model, 'delivery_warehouse')->textInput(['maxlength' => true]) ?>
    </div>

</div>
<div class="form-group">
    <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>